<?php
class mscountry_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function mscList(){
        $sts=$this->db->prepare('select * from country');
        $sts->execute();
        return $sts->fetchAll();
    }
    public function mscListSingle($id){
        $sts=$this->db->prepare('select * from country where CountryID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
    public function create($data){
        $sts=$this->db->prepare("INSERT INTO `country`(`CountryID`, `CountryName`) VALUES (:id,:name)");
        $sts->execute(array(
            ':id'=>0,
            ':name'=>$data
            ));
        
    }
    
    public function editSave($data){
        $sts=$this->db->prepare("Update `country` set CountryName=:name where CountryID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':name'=>$data['country']
            ));
    }

}