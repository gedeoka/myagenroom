<?php
class msprovence_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function mspList(){
        $sts=$this->db->prepare("SELECT province.*, CountryName "
                . "FROM `province` inner JOIN country "
                . "on province.CountryID=Country.CountryID ");
        $sts->execute();
        return $sts->fetchAll();
    }
    public function mscList(){
        $sts=$this->db->prepare('select * from country');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function mspListSingle($id){
        $sts=$this->db->prepare('select * from province where ProvinceID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
    public function mscListSingle($id){
        $sts=$this->db->prepare('select * from country');
        $sts->execute();
       
        return $sts->fetch();
    }
    public function create($data){
        $sts=$this->db->prepare("INSERT INTO `province`"
                . "(`ProvinceID`, `CountryID`, `ProvinceName`)"
                . " VALUES (:id,:cid,:name)");
        $sts->execute(array(
            ':id'=>0,
            ':cid'=>$data['cid'],
            ':name'=>$data['name']
            ));
    }
    
    public function editSave($data){
        $sts=$this->db->prepare("Update `Province` "
                . "set ProvinceName=:name,CountryID=:cid "
                . "where ProvinceID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':cid'=>$data['cid'],
            ':name'=>$data['name']
            ));
         
   }

}