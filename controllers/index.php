<?php

class Index extends Controllers{
    function __construct() {
        parent::__construct();
        Session::init();
        $loggin =  Session::get('loggedin');
        $type =  Session::get('TypeID');
        $usr =  Session::get('user');
        //echo $type."--";
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'ina');
            //$this->view->render('index/index');
            exit;            
        }else{
           //echo $type;
           //echo $usr; 
           
            if($type==1){
                $this->view->render('addashboard/index');
                exit;
            }elseif($type==2){
                //echo 'page is under Contruction';
                $this->view->render('prdashboard/index');
                exit;
            }elseif($type==3){
                $this->view->render('ina/logindex');
                exit;
            }else{
                Session::destroy();
                header('location: '.URL.'login/error/3');
                exit;  
            }
             
        }
             
    }
    function index(){
        /*
        if($type==1){
            $this->view->render(URL.'addashboard/index');
        }
        if($type==1){
            $this->view->render(URL.'dashboard/index');
        }
         * 
         */
        
    }
    
}