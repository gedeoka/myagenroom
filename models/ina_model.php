<?php
class Ina_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function hList(){
        $place=$_GET['place'];
        $startx=  explode('/', $_GET['checkin']);
        $in=$startx[2].'-'.$startx[1].'-'.$startx[0];
        $endx=  explode('/', $_GET['checkout']);
        $out=$endx[2].'-'.$endx[1].'-'.$endx[0];
        /*
        $sql="SELECT profile.ProfileID, Min(roomprice.Normal) AS price,roomprice.Rate,roomprice.RoomID, profile.Name, profile.Address, country.CountryName, area.AreaName, profile.Star, province.ProvinceName
FROM roomprice INNER JOIN (((profile INNER JOIN country ON profile.CountryID = country.CountryID) INNER JOIN area ON profile.AreaID = area.AreaID) INNER JOIN province ON profile.ProvinceID = province.ProvinceID) ON roomprice.ProfileID = profile.ProfileID
WHERE (((roomprice.StartDate)<='".$in."') AND ((roomprice.EndDate)>='".$in."') AND ((profile.Name) Like '%".$place."%')) OR (((province.ProvinceName) Like '%".$place."%')) OR (((country.CountryName) Like '%".$place."%')) OR (((profile.Address) Like '%".$place."%')) OR (((area.AreaName) Like '%".$place."%'))
GROUP BY profile.ProfileID, profile.Star, profile.Name, profile.Address, country.CountryName, area.AreaName, profile.Star, province.ProvinceName,roomprice.Rate
ORDER BY Min(roomprice.Normal) DESC;";
         * 
         */
        $sql="SELECT profile.ProfileID, Min(roomprice.Normal) AS price, profile.Name, profile.Address, country.CountryName, area.AreaName, profile.Star, province.ProvinceName, roomprice.StartDate, roomprice.EndDate
FROM roomprice INNER JOIN (((profile INNER JOIN country ON profile.CountryID = country.CountryID) INNER JOIN area ON profile.AreaID = area.AreaID) INNER JOIN province ON profile.ProvinceID = province.ProvinceID) ON roomprice.ProfileID = profile.ProfileID
WHERE 
(
((roomprice.StartDate)<'".$in."') AND ((roomprice.EndDate)>'".$in."')
)
 AND (
((profile.Name) Like '%".$place."%')
 OR 
((province.ProvinceName) Like '%".$place."%')
 OR 
((country.CountryName) Like '%".$place."%')
 OR 
((profile.Address) Like '%".$place."%')
 OR ((area.AreaName) Like '%".$place."%'))
GROUP BY profile.ProfileID, profile.Name, profile.Address, country.CountryName, area.AreaName, profile.Star, province.ProvinceName, roomprice.StartDate, roomprice.EndDate, profile.Star
ORDER BY Min(roomprice.Normal) DESC;";
        $sts = $this->db->prepare($sql);
        $sts->execute();
        //echo $sql;
        return $sts->fetchAll(PDO::FETCH_ASSOC);
    }
    public function data($id){
        $sql="SELECT profile.Address, profile.Phone, profile.Fax, profile.Star, country.CountryName, province.ProvinceName, area.AreaName, profile.Ina, profile.CheckIn, profile.CheckOut, profile.LatMap, profile.LongMap, profile.ProfileID
FROM ((profile INNER JOIN area ON profile.AreaID = area.AreaID) INNER JOIN country ON profile.CountryID = country.CountryID) INNER JOIN province ON (country.CountryID = province.CountryID) AND (profile.ProvinceID = province.ProvinceID)
WHERE (((profile.ProfileID)='".$id."'))";
        //echo $sql;
        $sts = $this->db->prepare($sql);
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        //print_r($data);
        return $data;
    }
    public function gallery($id){
        
        $sql=" select Image from profileg WHERE (ProfileID)='".$id."'";
        $sts = $this->db->prepare($sql);
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function rooms($id,$chin,$chout){
        //echo $id."-".$chin."-".$chout;
        $sql="SELECT roomprice.Normal, roomprice.Agent, roomprice.Rate, roomprice.Contract, room.RoomID, room.ProfileID, room.RoomName, room.Image, room.Note, room.NoRoom, room.NoPax, (room.NoRoom*room.NoPax) as MaxG
FROM room INNER JOIN roomprice ON (room.ProfileID = roomprice.ProfileID) AND (room.RoomID = roomprice.RoomID)
WHERE (((roomprice.StartDate)<='".$chin."') AND ((roomprice.EndDate)>='".$chin."') AND ((room.ProfileID)='".$id."'))
GROUP BY roomprice.Normal, roomprice.Agent, roomprice.Rate, roomprice.Contract, room.RoomID, room.ProfileID, room.RoomName, room.Image, room.Note, room.NoRoom, room.NoPax;";
        $sts = $this->db->prepare($sql);
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function fasility($id){
        
        $sql=" SELECT profilef.ProfileID, fasility.Fasility
FROM fasility INNER JOIN profilef ON fasility.FasilityID = profilef.FasilityID WHERE (ProfileID)='".$id."' GROUP BY profilef.ProfileID, fasility.Fasility;";
        $sts = $this->db->prepare($sql);
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}