<?php

class PrDashboard extends Controllers{
    function __construct() {
        parent::__construct();
        Session::init();
        $loggin =  Session::get('loggedin');
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'login');
            exit;            
        }
             
    }
    function index(){
        $this->view->render('addashboard/index');
    }
    function logout(){
        Session::destroy();
        header('location: '.URL.'login');
        exit;
    }
}