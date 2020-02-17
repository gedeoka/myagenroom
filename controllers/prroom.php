<?php

class prroom extends Controllers{
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
        $a =  Session::get('userID');    
        $profileid = Code::GetProfile($a);
        $id = $profileid[0]['ProfileID'];
        if (isset($_FILES['file'])){
           $this->model->paddprod($id);
        }
        $this->view->id=$id;
        $this->view->pProdList=$this->model->pProdList($id);        
        $this->view->render('prroom/index');
        
    }
    
    public function editroom($id = false){
        $id=  explode('-', $id);
        $this->view->ProfileID=$id[0];
        $this->view->RoomID=$id[1];
        
        $this->view->editroom=$this->model->editroom($id[0],$id[1]);
        
        $this->view->render('prroom/editroom');
    }
    public function seditroom($id = false){
        if ($id){
            $this->model->seditroom($id);
        }
            header('location: '.URL.'prroom');        
    }
}