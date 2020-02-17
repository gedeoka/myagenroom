<?php

class Code{
    public static function random_string(){
        $character_set_array = array();
        $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
    public static function profileid(){
        $character_set_array = array();
        $character_set_array[] = array('count' => 5, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 3, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
    public static function requery($table,$field,$criteria){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        $sts=$dbh->prepare("select ".$field." from `".$table."` where ".$criteria);
        $sts->execute();
        return $sts->rowCount();
        
    }
    public static function GetField($table,$field,$criteria){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        $sts=$dbh->prepare("select ".$field." from `".$table."` where ".$criteria);
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return  $data[0][$field];
        //print_r($data);
        
    }
    public static function GetProfile($id){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        $sts=$dbh->prepare("select ProfileID from `profile` where UserID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
        
    }
    public static function GetAgent($id){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        $sts=$dbh->prepare("select AgentID from `agent` where UserID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
        
    }
}

