<?php
class PrRoom_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    
    public function paddprod($id) {
        //$id=$_POST['ProfileID'];
        switch(strtolower($_FILES['file']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['file']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['file']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 150;
        $max_height = 150;

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
        
        $sts=$this->db->prepare("INSERT INTO `room`"
                . "(`RoomID`, `ProfileID`, `RoomName`, `Image`, `Note`,`NoRoom`,`NoPax`,`Rate`,`Publish`,`ContractRate`,`AgentRate`,Start_Date,End_Date ,`date_created`, `status`)"
                . " VALUES "
                . "(:id, :proid, :name, :image, :note,:noroom,:nopax,:rate,:publish,0,0,:start,:end,'".date('Y-m-d H:i:s')."', 1)");
        $pid=Code::random_string();
        $dateArray1 = explode('/', $_POST['start']);
        $date1 = $dateArray1[2].'-'.$dateArray1[1].'-'.$dateArray1[0];
        $dateArray2 = explode('/', $_POST['end']);
        $date2 = $dateArray2[2].'-'.$dateArray2[1].'-'.$dateArray2[0];
        $sts->execute(array(
            ':id'=> $pid,
            ':proid'=>$id,
            ':name'=>$_POST['name'],
            ':image'=>$SaveName,
            ':note'=>$_POST['note'],
            ':noroom'=>$_POST['roomno'],
            ':nopax'=>$_POST['nopax'],
            ':rate'=>$_POST['rate'],
            ':publish'=>$_POST['prate'],
            ':start'=>$date1,
            ':end'=>$date2
            ));  
        
    }   
    
    public function pProdList($id){
        $sts=$this->db->prepare("select * from room where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
    //EditRoom
    public function editroom($pid,$rid){
       
        $sts=$this->db->prepare("SELECT * from room where ((room.ProfileID='".$pid."') and (room.RoomID='".$rid."'))");
        $sts->execute();
        //echo  "SELECT roomprice.*, room.RoomName FROM room INNER JOIN roomprice ON (room.ProfileID = roomprice.ProfileID) AND (room.RoomID = roomprice.RoomID) where ((ProfileID='".$pid."') and (RoomID='".$rid."'))";
        return $sts->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //Save Edit Room
    public function seditroom($id=false){
         
         $sts=$this->db->prepare("UPDATE `room` SET"
                . " `RoomName`=:name, `NoRoom`=:noroom,`NoPax`=:nopax,`Note`=:note"
                . " WHERE (`RoomID`=:roomid) and (`ProfileID`=:profile)");
        
         $sts->execute(array(
             ':name'=> $_POST['name'],
             ':noroom'=>$_POST['roomno'],
             ':nopax'=>$_POST['nopax'],
             ':note'=>$_POST['note'],
             ':roomid'=>$_POST['RoomID'],
             ':profile'=>$_POST['ProfileID']
         ));
         if(isset($_FILES['file'])){
            $img=$_POST['Image'];
            unlink($img);
            switch(strtolower($_FILES['file']['type'])){
            //buat image            
            case 'image/jpeg':
                $image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($_FILES['file']['tmp_name']);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($_FILES['file']['tmp_name']);
                break;

            } 
            // Target dimensions Big File
            $max_width = 150;
            $max_height = 150;

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

            $sts=$this->db->prepare("UPDATE `room` SET"
                . " `Image`=:image"
                . " WHERE (`RoomID`=:roomid) and (`ProfileID`=:profile)");
        
            $sts->execute(array(
                ':image'=> $SaveName,
                ':roomid'=>$_POST['RoomID'],
                ':profile'=>$_POST['ProfileID']
            ));
         }
           // print_r($sts);
    }
}