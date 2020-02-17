<?php

class MsCountry extends Controllers{
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
        $this->view->mscList=$this->model->mscList();
        $this->view->render('mscountry/index');
    }
    
    public function create(){
        $country=$_POST['Country'];
        //echo $country;
        //@todo: Check Name 
        $this->model->create($country);
        header('location: '.URL.'mscountry');
    }
    public function edit($id){
        $this->view->mscListSingle=$this->model->mscListSingle($id);
        $this->view->render('mscountry/edit');
    }
    public function saveEdit($id){
        $data=array();
        $data['id']=$id;
        $data['country']=$_POST['Country'];
        //echo $country;
        //@todo: Check Name 
        $this->model->editSave($data);
        
        header('location: '.URL.'mscountry');
    }
    
}