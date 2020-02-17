<?php

class Error extends Controllers{

    function __construct() {
        parent::__construct();
        
       
    }
    function index(){
        Session::init();
        $loggin =  Session::get('loggedin');
        
        if($loggin == FALSE){
            Session::destroy();
            $this->view->msg='This Is Error Message.....';
            $this->view->render('error/index');
            exit;            
        }else{
            $this->view->msg="I'm Sorry.<br> <small>we cannot find the page that you request.</small>";
            $this->view->render('error/index2');
        }
        
        
    }
}