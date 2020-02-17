
<script src="<?php echo URL;?>js/jquery.sortelements.js" type="text/javascript"></script>
<script src="<?php echo URL;?>js/jquery.bdt.js" type="text/javascript"></script>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Room <br><small> [ <a href="<?php echo URL;?>mspartner/product/<?php echo $this->editroom['0']['ProfileID'];?>"> back </a> ] </small></h2>                                    
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <form action="<?php echo URL."mspartner/seditroom/".$this->editroom['0']['ProfileID'];?>" method="POST" enctype="multipart/form-data" name="myForm" id="myForm" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Type</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="name" name="name" placeholder="Room Type" type="text" required value="<?php echo $this->editroom['0']['RoomName'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Max of room</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="roomno" name="roomno" placeholder="Room" type="text" required value="<?php echo $this->editroom['0']['NoRoom'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of Pax</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="nopax" name="nopax" placeholder="No. of Pax" type="text" required value="<?php echo $this->editroom['0']['NoPax'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Note</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea  class="jqte-test" id="note" name="note" placeholder="Note" type="text" ><?php echo $this->editroom['0']['Note'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Image </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="file" id="uploadfile" class="form-control" />
                        </div>
                    </div>
                    <input type="hidden" name="ProfileID" value="<?php echo $this->editroom['0']['ProfileID'];?>">
                    <input type="hidden" name="RoomID" value="<?php echo $this->editroom['0']['RoomID'];?>">
                    <input type="hidden" name="Image" value="<?php echo URL.($this->editroom['0']['Image']);?>">
                    <div id="selectedimage"></div>
                    <p id="errors"></p>
                    <img class="del" src="<?php echo $this->editroom['0']['Image'];?>">
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
        <div class="clearfix"></div>
    </div>
    
</div>

<style>
    #selectedimage img{
        height: 150px;
        width: 150px;
    }
</style>
<link rel="stylesheet" href="<?php echo URL;?>css/jquery.css.ui.css">


<script>
///tampilkan File Image Upload 
$('#uploadfile').on('change', showfiles);
        $('#tableData').bdt();
function showfiles(event){
	$("#errors").empty();
        $(".del").remove();
	$("#selectedimage").empty();
	files = event.target.files;

	var error = 0;
	var errorMessage = "";
	

	for (var i = 0; i < files.length; i++) {
		file = files[i];
		if(!file.type.match('image.*')){
		/* Check if the selected file is an image or not */
			error = 1;
			errorMessage = "\"" + file.name + "\"" + errorMessage ;
		}else{
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = function() {

				console.log(reader.result);
				var img = new Image();		
				img.src = reader.result;
				$("#selectedimage").append(img);
			};
		}
	}

	if(error && errorMessage){
		/* If error variable is triggered print error*/
		errorMessage = errorMessage + " is not image file";
		$("#errors").append(errorMessage);	
	}
}

$('.jqte-test').jqte();
	
// settings of status
var jqteStatus = true;
$(".status").click(function()
{
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
});
</script>
