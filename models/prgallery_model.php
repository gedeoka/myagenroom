<?php
class PrGallery_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    
    public function pGalList($id){
        $sts=$this->db->prepare("SELECT * FROM profileg where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
    
    public function pUpload($id){ 
        
        switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 600;
        $max_height = 400;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        $filename = __DIR__."./../gallery/".$id."-".time().".jpeg";
        $SaveName = "gallery/".$id."-".time().".jpeg";
        imagejpeg($new,$filename,100);
        
        // Target dimensions Thumbs
        $max_width2 = 200;
        $max_height2 = 200;

        // Get current dimensions
        $old_width2  = imagesx($image);
        $old_height2 = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale2      = min($max_width2/$old_width2, $max_height2/$old_height2);

        // Get the new dimensions
        $new_width2  = ceil($scale2*$old_width2);
        $new_height2 = ceil($scale2*$old_height2);
        // Create new empty image
        $new2 = imagecreatetruecolor($new_width2, $new_height2);

        // Resize old image into new
        imagecopyresampled($new2, $image, 0, 0, 0, 0, $new_width2, $new_height2, $old_width2, $old_height2);
        $filename2 = __DIR__."./../gallery/".$id."_".time()."_Thumb.jpeg";
        $ThumbName = "gallery/".$id."_".time()."_Thumb.jpeg";
        imagejpeg($new2,$filename2,100);
        
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `profileg` (GalleryID,ProfileID,Image,Thumb,Name) VALUES (:id,:profile,:image,:thumb,:name)");
        $sts2->execute(array(
            ':id'=>  Code::random_string(),
            ':profile'=>$id,
            ':image'=>$SaveName,
            ':thumb'=>$ThumbName,
            ':name'=>$_POST['name']
        ));
    }
    
    public function pdelgal(){
        //select Link Image
        
        $sql = "select * from profileg where GalleryID='".$_POST['gid']."' and ProfileID='".$_POST['prid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
	while($r = $q->fetch()){
          $img=$r['Image'];
	  unlink($img);
          $thumb=$r['thumb'];
          unlink($thumb);
	}
        
        // remove dari database         
        $sts=$this->db->prepare("Delete from profileg where GalleryID='".$_POST['gid']."' and ProfileID='".$_POST['prid']."'");
        $sts->execute();
       
        
    }
    
}