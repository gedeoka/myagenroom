<?php

class MsArea extends Controllers{
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
        $this->view->msaList=$this->model->msaList();
        $this->view->mspList=$this->model->mspList();
        $this->view->mscList=$this->model->mscList();
        $this->view->js=array('msarea/js/default.js');
        $this->view->render('msarea/index');
    }
    
    public function create(){
        $data=array();
        $data['name']=$_POST['area'];
        $data['cid']=$_POST['cid'];
        $data['pid']=$_POST['pid'];
        
        //echo $country;
        //@todo: Check Name 
        $this->model->create($data);
        
        header('location: '.URL.'msarea');
    }
    public function edit($id){
        $this->view->msaListSingle=$this->model->msaListSingle($id);
        $this->view->mspList=$this->model->mspList();
        $this->view->mscList=$this->model->mscList();
        $this->view->js=array('msarea/js/default2.js');
        $this->view->render('msarea/edit');
    }
    public function saveEdit($id){
        $data=array();
        $data['id']=$id;
        $data['name']=$_POST['area'];
        $data['cid']=$_POST['cid'];
        $data['pid']=$_POST['pid'];
        //echo $country;
        //@todo: Check Name 
        $this->model->editSave($data);
        
        header('location: '.URL.'msarea');
    }
    
}