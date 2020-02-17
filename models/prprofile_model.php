<?php
class PrProfile_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    
    public function pDfas1(){
        $sts=$this->db->prepare('select * from fasility where Category=1');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function pDfas2(){
        $sts=$this->db->prepare('select * from fasility where Category=2');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function pDfas3(){
        $sts=$this->db->prepare('select * from fasility where Category=3');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function pDfas4(){
        $sts=$this->db->prepare('select * from fasility where Category=4');
        $sts->execute();
        return $sts->fetchAll();
    }
   
    public function pmsPListSingle($id){
        $sts=$this->db->prepare('select * from `profile` where ProfileID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));       
        return $sts->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function pmsaList(){
        $sts=$this->db->prepare("SELECT * FROM area");
        $sts->execute();
        return $sts->fetchAll();
    }
    
    public function pmspList(){
        $sts=$this->db->prepare("SELECT province.* FROM `province`");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function pmscList(){
        $sts=$this->db->prepare('select * from country');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function pfasList($id){
        $sts=$this->db->prepare("select * from profilef where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function msCcList(){
        $sts=$this->db->prepare("SELECT * FROM category");
        $sts->execute();
        return $sts->fetchAll();
    }
    /*** Create New Profile
    public function createProfile($data){
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
                `AreaID`,`Deskripsi`,`ZipCode`,`LatMap`,`LongMap`, `Date_Created`)            
                VALUES
                (:profileID,:userID, :Name,:Address,:Phone,:Fax,:website,:email,:star,
                    :CountryID,:ProvinceID,:AreaID,:Deskripsi,:ZipCode,:LatMap,:LongMap,:Date_Created)");
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
            ':Deskripsi'=>'',
            ':ZipCode'=>'',
            ':LatMap'=>'',
            ':LongMap'=>'',
            ':Date_Created'=>$data['dates']
            ));
           
    }
     * 
     */
    
    
    public function pEditProfile($id,$data){
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
                . ", CategoryID='".$data['cat']."'"
                . ", Eng='".$data['deng']."'"
                . ", Ina='".$data['dina']."'"
                . ", Chn='".$data['dchn']."'"
                . ", Zipcode='".$data['zipcode']."'"
                . ", LatMap='".$data['latmap']."'"
                . ", LongMap='".$data['longmap']."'"
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
    
}