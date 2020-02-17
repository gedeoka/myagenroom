<?php
class MsPartner_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function msuList(){
        $sts=$this->db->prepare('select user.*,Profile.ProfileID from user inner join Profile on user.UserID=Profile.UserID where TypeID=2');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function Dfas1(){
        $sts=$this->db->prepare('select * from fasility where Category=1');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function Dfas2(){
        $sts=$this->db->prepare('select * from fasility where Category=2');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function Dfas3(){
        $sts=$this->db->prepare('select * from fasility where Category=3');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function Dfas4(){
        $sts=$this->db->prepare('select * from fasility where Category=4');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function msuListSingle($id){
        $sts=$this->db->prepare("select user.*,Profile.ProfileID from user inner join Profile on user.UserID=Profile.UserID where user.userID=:id");
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
     public function msPListSingle($id){
        $sts=$this->db->prepare('select * from `profile` where ProfileID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
        
    }
    public function msaList(){
        $sts=$this->db->prepare("SELECT * FROM area");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function msCcList(){
        $sts=$this->db->prepare("SELECT * FROM category");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function GalList($id){
        $sts=$this->db->prepare("SELECT * FROM profileg where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function mspList(){
        $sts=$this->db->prepare("SELECT province.* FROM `province`");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function mscList(){
        $sts=$this->db->prepare('select * from country');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function fasList($id){
        $sts=$this->db->prepare("select * from profilef where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function create($data){
        //insert ke tabel user dengan status Partner(Hotel/Villa
        $sts=$this->db->prepare("INSERT INTO `user`(`userID`, `username`, `password`, `Name`, `TypeID`, `Date_Created`, `aktif`)            
                VALUES (:id,:user,md5(:password),:name,2,:dates,1)");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':user'=>$data['uname'],
            ':password'=>$data['password'],
            ':name'=>$data['name'],
            ':dates'=>$data['dates']
            ));
        //buat profilenya
        $sts2=$this->db->prepare("INSERT INTO `profile`
                (`profileID`,`userID`, `Name`, `Address`, `Phone`, `Fax`,`website`,`email`,`star`, `CountryID`,`ProvinceID`,
                `AreaID`,`Ina`,`Eng`,`Chn`,`ZipCode`,`LatMap`,`LongMap`, `Date_Created`,`CategoryID`)            
                VALUES
                (:profileID,:userID, :Name,:Address,:Phone,:Fax,:website,:email,:star,
                    :CountryID,:ProvinceID,:AreaID,:Ina,:Eng,:Chn,:ZipCode,:LatMap,:LongMap,:Date_Created,:CategoryID)");
        $sts2->execute(array(
            ':profileID'=>  Code::profileid(),
            ':userID'=>$data['id'],
            ':Name'=>$data['name'],
            ':Address'=>'',
            ':Phone'=>'',
            ':Fax'=>'',
            ':website'=>'',
            ':email'=>$data['uname'],
            ':star'=>'',
            ':CountryID'=>'',
            ':ProvinceID'=>'',
            ':AreaID'=>'',
            ':Ina'=>'',
            ':Eng'=>'',
            ':Chn'=>'',
            ':ZipCode'=>'',
            ':LatMap'=>'',
            ':LongMap'=>'',
            ':CategoryID'=>'',
            ':Date_Created'=>$data['dates']
            ));
           
    }
    //edit User
    public function editSave($data){
        $sql="Update `user` set ";
        if($data['password']<>""){
            $sql=$sql." password=md5(:password) ";
            $pass=$data['password'];
        }else{
            $sql=$sql." password=:password ";
            $pass=$data['password2'];
        }
        $sql=$sql." , Name=:name ";
        $sql=$sql." where userID=:id ";
        echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['name'],
            ':password'=>$pass
            ));
            print_r($data);
    }
    //void User set non active
    public function void($id){
        $sql="update `user` set aktif=0 where userID='".$id."'";
        $sts=$this->db->prepare($sql);
        $sts->execute();
        
    }
    //update profile
    public function EditProfile($id,$data){
        $sql1="update `profile` set "
                . "Name='".$data['name']."'"
                . ", Address='".$data['address']."'"
                . ", Phone='".$data['phone']."'"
                . ", Fax='".$data['fax']."'"
                . ", website='".$data['website']."'"
                . ", Star='".$data['star']."'"
                . ", CheckIn='".$data['checkin']."'"
                . ", CheckOut='".$data['checkout']."'"
                . ", CountryID='".$data['country']."'"
                . ", ProvinceID='".$data['province']."'"
                . ", AreaID='".$data['area']."'"
                . ", Eng='".$data['deng']."'"
                . ", Ina='".$data['dina']."'"
                . ", Chn='".$data['dchn']."'"
                . ", Zipcode='".$data['zipcode']."'"
                . ", LatMap='".$data['latmap']."'"
                . ", LongMap='".$data['longmap']."'"
                . ", CategoryID='".$data['cat']."'"
                . " where ProfileID='".$id."'";
        $sts1=$this->db->prepare($sql1);
        $sts1->execute();
        $sts1=$this->db->prepare("delete from `profilef` where `ProfileID`='".$id."'");
        $sts1->execute();
        
        
        for ($i=1;$i<79;$i++){
            if(isset($_POST['Chk'.$i])){
            $sts2=$this->db->prepare("INSERT INTO `profilef` (FasilityID,ProfileID,act) VALUES (:id,:profile,1)");
            $sts2->execute(array(
                ':id'=>$i,
                ':profile'=>$id,
            ));  
            }
        }
    }
    
    //input new gallery Image
    public function Upload($id){ 
        
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
    
    // delete Gallery Image
    public function delgal(){
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
    
    //add new Room
    public function addprod($id) {
        $id=$_POST['ProfileID'];
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
                . "(`RoomID`, `ProfileID`, `RoomName`, `Image`, `Note`,`NoRoom`,`NoPax`,`date_created`, `status`)"
                . " VALUES "
                . "(:id, :proid, :name, :image, :note,:noroom,:nopax,'".date('Y-m-d H:i:s')."', 1)");
        $pid=$_POST['RoomID'];
        $sts->execute(array(
            ':id'=> $pid,
            ':proid'=>$id,
            ':name'=>$_POST['name'],
            ':image'=>$SaveName,
            ':note'=>$_POST['note'],
            ':noroom'=>$_POST['roomno'],
            ':nopax'=>$_POST['nopax']
            ));
    }   
    
    //List Room By ID
    public function ProdList($id){
        $sts=$this->db->prepare("select * from room where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
    
    
    //Cek Room Price di tanggal
    public function cekprice(){
        $pid=$_POST['ProfileID'];
        $rid=$_POST['RoomID'];
        $startx=  explode('/', $_POST['start']);
        $start=$startx[2].'-'.$startx[1].'-'.$startx[0];
        $endx=  explode('/', $_POST['end']);
        $end=$endx[2].'-'.$endx[1].'-'.$endx[0];
        $sts=$this->db->prepare("select * from roomprice  where (ProfileID='".$pid."') and (RoomID='".$rid."') and (StartDate<='".$start."') and (EndDate>='".$end."')");
        
        $sts->execute();
        print_r($sts->rowCount());
        //return $sts->execute();
        
       
    }
    
    // tambah baru Room Price by periode
    public function addprice(){
        $sts=$this->db->prepare("INSERT INTO `roomprice`"
                . "(`rID`,`RoomID`, `ProfileID`, `StartDate`, `EndDate`, `Normal`,`Rate`,`Agent`,`Contract`)"
                . " VALUES "
                . "(0,:rid, :pid, :start, :end, :normal,:rate,:agent,:contract)");
        $rid=$_POST['RoomID'];
        $pid=$_POST['ProfileID'];
        $startx=  explode('/', $_POST['start']);
        $start=$startx[2].'-'.$startx[1].'-'.$startx[0];
        $endx=  explode('/', $_POST['end']);
        $end=$endx[2].'-'.$endx[1].'-'.$endx[0];
        $sts->execute(array(
            ':rid'=> $rid,
            ':pid'=>$pid,
            ':start'=>$start,
            ':end'=>$end,
            ':normal'=>$_POST['prate'],
            ':rate'=>$_POST['rate'],
            ':agent'=>$_POST['agent'],
            ':contract'=>$_POST['contract']
            ));
        /*
        while (strtotime($start) <= strtotime($end)) {
                $sts=$this->db->prepare("INSERT INTO `roomdayprice` (`RoomID`, `ProfileID`, `Date`,  `Normal`,`Rate`,`Agent`,`Contract`) VALUES (:rid, :pid, :date, :normal,:rate,:agent,:contract)");
                $sts->execute(array(
                    ':rid'=> $rid,
                    ':pid'=>$pid,
                    ':date'=>$start,
                    ':normal'=>$_POST['prate'],
                    ':rate'=>$_POST['rate'],
                    ':agent'=>$_POST['agent'],
                    ':contract'=>$_POST['contract']
                    ));
                $start = date ("Y-m-d", strtotime("+1 day", strtotime($start)));
	}
         * 
         */
    }
    
    // view Room Price List
    public function pricelist($pid,$rid){
       
        $sts=$this->db->prepare("SELECT roomprice.*, room.RoomName FROM room INNER JOIN roomprice ON (room.ProfileID = roomprice.ProfileID) AND (room.RoomID = roomprice.RoomID) where ((room.ProfileID='".$pid."') and (room.RoomID='".$rid."'))");
        $sts->execute();
        //echo  "SELECT roomprice.*, room.RoomName FROM room INNER JOIN roomprice ON (room.ProfileID = roomprice.ProfileID) AND (room.RoomID = roomprice.RoomID) where ((ProfileID='".$pid."') and (RoomID='".$rid."'))";
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