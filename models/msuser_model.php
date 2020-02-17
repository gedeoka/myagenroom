<?php
class MsUser_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function msuList(){
        $sts=$this->db->prepare('select * from user where TypeID=1');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function msuListSingle($id){
        $sts=$this->db->prepare('select * from user where userID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
    public function create($data){
        $sts=$this->db->prepare("INSERT INTO `user`(`userID`, `username`, `password`, `Name`, `TypeID`, `Date_Created`, `aktif`)            
                VALUES (:id,:user,md5(:password),:name,1,:dates,1)");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':user'=>$data['uname'],
            ':password'=>$data['password'],
            ':name'=>$data['name'],
            ':dates'=>$data['dates']
            ));
        
    }
    
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
    public function void($id){
        $sql="update `user` set aktif=0 where userID='".$id."'";
        $sts=$this->db->prepare($sql);
        $sts->execute();
        
    }
            
}