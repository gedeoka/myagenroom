
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Upload Image</h2>                                    
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <form action="" method="POST" enctype="multipart/form-data" name="myForm" id="imageuploadFrom" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Deskription</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="name" name="name" placeholder="Default Input" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Image </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="files" id="uploadfile" class="form-control" required/>
                        </div>
                    </div>
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
    <style>
        #selectedimage img{
            height: 150px;
            width: 150px;
        }
        .imgList{
            display: block;
            float: left;
            padding: 10px;
            margin: 10px;
            height: 220px;
            width: 200px;
            border: 1px solid rgba(152, 152, 152, 0.95);
            border-radius: 5px;
        }
        .imgList img{
            height: 150px;
            width: 180px;
            border: 1px solid rgba(152, 152, 152, 0.95);
        }
        .imgList p{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            text-align: center;
            font-weight: bold;
            padding-top: 2px;
        }
        .del{
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 12px;
            padding-left: 68px;
            
        }
    </style> 
 


    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Image</h2><br><br>
                        <p>[ <a href="<?php echo URL;?>mspartner">back</a> ]</p>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <?php
                        foreach ($this->GalList as $key => $value){
                        ?>
                        
                            <div class="imgList">
                                    <img src="<?php echo URL.$value['thumb']; ?>">
                                    <p><?php echo $value['Name']; ?></p>
                                    <a class="del" href="#" rel="<?php echo $value['GalleryID']; ?>" rels="<?php echo $value['ProfileID']; ?>"> Delete </a>
                            </div>
                        
                        <?php } ?>
                        

                    </div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        
    </div>
</div>
<script>
 
$('#uploadfile').on('change', showfiles);

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
$('.del').click(function(){
    delItem=$(this).parent();
    var gid = $(this).attr('rel');
    var prid=$(this).attr('rels');
    
    $.post("../delgal",data,function(x){
        //alert(x);
       delItem.remove();
    });
    return false;
    
});
</script>