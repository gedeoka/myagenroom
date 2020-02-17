<?php
class PrPrice_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
    
    //Cek Room Price di tanggal
    public function pcekprice(){
        $pid=$_POST['ProfileID'];
        $rid=$_POST['RoomID'];
        $startx=  explode('/', $_POST['start']);
        $start=$startx[2].'-'.$startx[1].'-'.$startx[0];
        $endx=  explode('/', $_POST['end']);
        $end=$endx[2].'-'.$endx[1].'-'.$endx[0];
        $sts=$this->db->prepare("select * from roomprice  where (ProfileID='".$pid."') and (RoomID='".$rid."') and (StartDate<='".$start."') and (EndDate>='".$end."')");
        $sts->execute();
        print_r($sts->rowCount());
       
    }
    
    // tambah baru Room Price by periode
    public function paddprice(){
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
         * *
         */
    }
    
    // view Room Price List
    public function ppricelist($pid,$rid){
       
        $sts=$this->db->prepare("SELECT roomprice.*, room.RoomName FROM room INNER JOIN roomprice ON (room.ProfileID = roomprice.ProfileID) AND (room.RoomID = roomprice.RoomID) where ((room.ProfileID='".$pid."') and (room.RoomID='".$rid."'))");
        $sts->execute();
        //echo  "SELECT roomprice.*, room.RoomName FROM room INNER JOIN roomprice ON (room.ProfileID = roomprice.ProfileID) AND (room.RoomID = roomprice.RoomID) where ((ProfileID='".$pid."') and (RoomID='".$rid."'))";
        return $sts->fetchAll();
    }
}