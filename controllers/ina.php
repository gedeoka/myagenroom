<?php

class ina extends Controllers{
    public function __construct() {
        parent::__construct();
        Session::init();
        $loggin =  Session::get('loggedin');
        /*
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'login');
            exit;            
        }
         * 
         */
             
    }
    public function index(){
        $loggin =  Session::get('loggedin');
        //$this->view->msuList=$this->model->msuList();
        if($loggin == FALSE){
            Session::destroy();
            $this->view->render('ina/index');
            exit;            
        }else{
            $this->view->render('ina/logindex');
            exit;
        }
    }
    public function search(){
        $x=0;
        
        if (isset($_GET['place']) && !empty($_GET["place"])){ $x=$x+1;}        
        if (isset($_GET['checkin'])  && !empty($_GET["checkin"])){ $x=$x+1;}        
        if (isset($_GET['checkout'])  && !empty($_GET["checkout"])){ $x=$x+1;}
        if ($x<2){            
            $this->view->render('ina/index');
        }else{
        $this->view->place=$_GET['place'];
        $this->view->chin=$_GET['checkin'];
        $this->view->chout=$_GET['checkout'];
        $this->view->show="search";
        $this->view->hList=$this->model->hList();
        $this->view->render('ina/search');
        
        }
    }
    public function details(){
        $x=0;
        
        if (isset($_GET["detail"])){
            $x=$x+1;
        }
        
        if ($x==0){
            echo 'error';
            exit;
        }else{
        $id=$_GET["detail"];
        //echo $id;
        $data=explode("`",$id);
        $this->view->name=$data[0];
        $in=explode("f",$data[1]);
        $cin=$in[2]."/".$in[1]."/".$in[0];
        $chin=$in[0]."-".$in[1]."-".$in[2];
        $this->view->din=$cin;
        $this->view->chin=$data[1];
        $out=explode("f",$data[2]);
        $cout=$out[2]."/".$out[1]."/".$out[0];
        $chout=$out[0]."-".$out[1]."-".$out[2];
        $this->view->dout=$cout;
        $this->view->chout=$data[2];
        $this->view->profile=$data[3];
        $this->view->room=$data[4];
        $this->view->data=$this->model->data($data[3]);
        $this->view->fasility=$this->model->fasility($data[3]);
        $this->view->gallery=$this->model->gallery($data[3]);
        $this->view->rooms=$this->model->rooms($data[3],$chin,$chout);
        /*
        $this->view->place=$_GET['place'];
        $this->view->chin=$_GET['checkin'];
        $this->view->chout=$_GET['checkout'];
        $this->view->show="search";
        $this->view->hList=$this->model->hList();
         * * 
      */
         
        $this->view->render('ina/detail');
        }
    }
	
}