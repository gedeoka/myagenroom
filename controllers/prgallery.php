<?php

class PrGallery extends Controllers{
    public function __construct() {
        parent::__construct();
        Session::init();
        $loggin =  Session::get('loggedin');
        
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'login');
            exit;            
        }
             
    }
    public function index(){
        $a=  Session::get('userID');    
        $profileid = Code::GetProfile($a);
        $id = $profileid[0]["ProfileID"];
        if (isset($_FILES['files'])){
           $this->model->pUpload($id);
        }
        $this->view->pGalList =$this->model->pGalList($id);
        
        $this->view->render('prgallery/index');
    }
    
    
    public function pdelgal(){
        $this->model->pdelgal();
    }
    
}