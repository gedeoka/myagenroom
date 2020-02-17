<?php
class msarea_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function msaList(){
        $sts=$this->db->prepare("SELECT `area`.*,`country`.`CountryName`,`province`.`ProvinceName` "
                . "FROM (area INNER JOIN `country` ON area.CountryID=country.CountryID) "
                . "INNER JOIN `province` ON area.ProvinceID=province.ProvinceID ");
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
    public function msaListSingle($id){
        $sts=$this->db->prepare('select * from area where AreaID=:id');
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
        $sts=$this->db->prepare("INSERT INTO `area`"
                . "(`AreaID`, `CountryID`,`ProvinceID`, `AreaName`)"
                . " VALUES (:id,:cid,:pid,:name)");
        $sts->execute(array(
            ':id'=>0,
            ':cid'=>$data['cid'],
            ':pid'=>$data['pid'],
            ':name'=>$data['name']
            ));
            print_r($sts);
            print_r($data);
    }
    
    public function editSave($data){
        $sts=$this->db->prepare("Update `area` "
                . "set AreaName=:name, CountryID=:cid, ProvinceID=:pid "
                . "where AreaID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
            ':cid'=>$data['cid'],
            ':pid'=>$data['pid'],
            ':name'=>$data['name']
            ));
         
   }

}