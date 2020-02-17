<?php

class MsProvence extends Controllers{
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
        $this->view->mspList=$this->model->mspList();
        $this->view->mscList=$this->model->mscList();
        $this->view->render('msprovence/index');
    }
    
    public function create(){
        $data=array();
        $data['name']=$_POST['province'];
        $data['cid']=$_POST['cid'];
        
        //echo $country;
        //@todo: Check Name 
        $this->model->create($data);
        header('location: '.URL.'msprovence');
    }
    public function edit($id){
        $this->view->mspListSingle=$this->model->mspListSingle($id);
        $this->view->mscList=$this->model->mscList();
        $this->view->render('msprovence/edit');
    }
    public function saveEdit($id){
        $data=array();
        $data['id']=$id;
        $data['name']=$_POST['province'];
        $data['cid']=$_POST['cid'];
        //echo $country;
        //@todo: Check Name 
        $this->model->editSave($data);
        
        header('location: '.URL.'msprovence');
    }
    
}