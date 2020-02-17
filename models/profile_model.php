<?php
class Profile_Model extends Model{

    public function __construct() {
        parent::__construct();
    }
    
   
    public function msPListSingle($id){
        //echo $id;
        $sql="SELECT agent.*, user.userID, user.username
FROM agent INNER JOIN `user` ON agent.UserID = user.userID
where agent.AgentID=:id";
        
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$id
        ));
        //echo $sts->rowCount();
       return $sts->fetch();
        
    }
    
    
    public function pEdit($id,$data){
        $sql1="update `agent` set "
                . "Name='".$data['name']."'"
                . ", Address='".$data['address']."'"
                . ", Phone='".$data['phone']."'"
                . ", Fax='".$data['fax']."'"
                . " where AgentID='".$id."'";
        echo $sql1;
        $sts1=$this->db->prepare($sql1);
        $sts1->execute();
        
    }
    
    //input new gallery Image
    
}