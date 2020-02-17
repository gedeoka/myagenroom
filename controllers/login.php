<?php

class Login extends Controllers{

    function __construct() {
        parent::__construct();
    }
    function index(){
        //$this->view->msg='Error';
        $this->view->render('login/index');
    }
    function run(){
        //echo 'test run';
        $this->model->run();
    }
    function error($arg=FALSE){
        if($arg==1) {
            $this->view->msg='Login Failed<br>USERNAME and PASSWORD are not Macth!!';
            $this->view->render('login/index');
        }
        if($arg==2) {
            $this->view->msg='Login Failed<br>USERNAME has been lock !!';
            $this->view->render('login/index');
        }
         if($arg==3) {
            $this->view->msg='';
            $this->view->render('login/index');
        }
    }
    function logout(){
        Session::destroy();
        //unset($_SESSION);
        header('location: '.URL);
        //echo "Sessio Off";
        exit;
    }
}