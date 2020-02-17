
<script src="<?php echo URL;?>js/jquery.sortelements.js" type="text/javascript"></script>
<script src="<?php echo URL;?>js/jquery.bdt.js" type="text/javascript"></script>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Room</h2>                                    
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <form action="" method="POST" enctype="multipart/form-data" name="myForm" id="myForm" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Type</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="name" name="name" placeholder="Room Type" type="text" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Max of room</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="roomno" name="roomno" placeholder="Room" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of Pax</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="nopax" name="nopax" placeholder="No. of Pax" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Note</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea  class="jqte-test" id="note" name="note" placeholder="Note" type="text"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Image </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="file" id="uploadfile" class="form-control" required/>
                        </div>
                    </div>
                    <input type="hidden" name="ProfileID" value="<?php echo $this->id;?>">
                    <input type="hidden" name="RoomID" value="<?php echo Code::random_string();?>">
                    <div id="selectedimage"></div>
                    <p id="errors"></p>
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
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Rooms</h2><br><br>
                        <p>[ <a href="<?php echo URL;?>mspartner">back</a> ]</p>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tableData" class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                    <th class="column-title">ID Room</th>
                    <th class="column-title">Room Type</th>
                    <th class="column-title">Max of room </th>
                    <th class="column-title">No. of Pax </th>
                    <th class="column-title">Note </th>
                    <th class="column-title">Set Price </th>
                    <th class="column-title">Edit Room</th>
                    
                    
                    </tr>
                    </thead>

                    <tbody>
                         <?php
                        foreach ($this->pProdList as $key => $value) {
                            ?>
                        <tr class="even pointer">                            
                            <td class=" "><?php echo $value['RoomID']; ?></td>
                            <td class=" "><?php echo $value['RoomName']; ?> </td>
                            <td class=" "><?php echo $value['NoRoom']; ?></td>
                            <td class=" "><?php echo $value['NoPax']; ?></td>
                            <td class=" last"><?php echo $value['Note']; ?></td>
                            <td class=" last"><a href="<?php echo URL;?>prprice/index/<?php echo $value['ProfileID']; ?>-<?php echo $value['RoomID']; ?>">Set Price</a></td>
                            <td class=" last"><a href="<?php echo URL;?>prroom/editroom/<?php echo $value['ProfileID']; ?>-<?php echo $value['RoomID']; ?>">Edit</a></td>
                           
                            
                        </tr>
                        <?php } ?>
                       
                       
                    </tbody>

                </table>

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
