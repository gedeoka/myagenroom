<?php

class prprice extends Controllers{
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
    public function index($id = false){
        
        $id=  explode('-', $id);
        $this->view->pProfileID=$id[0];
        $this->view->pRoomID=$id[1];        
        $this->view->ppricelist=$this->model->ppricelist($id[0],$id[1]);        
        $this->view->render('prprice/index');         
    }
    // Control cek Price List
    public function pcekprice(){
        $this->view->pcekprice=$this->model->pcekprice();
    }
    
    //controll Add Room Price
    public function paddprice(){
        $this->view->paddprice=$this->model->paddprice();
    }
    
    
    
}