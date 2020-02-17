<?php

class MsUser extends Controllers{
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
        $this->view->msuList=$this->model->msuList();
        $this->view->render('msuser/index');
       
    }
    public function add(){
        $this->view->render('msuser/add');
    }

    public function create(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['uname']=$_POST['uname'];
        $data['password']=$_POST['password'];
        $data['id']=$_POST['id'];
        $data['dates']=date('Y-m-d H:i:s');
        //print_r($data);
        //echo $country;
        //@todo: Check Name 
        $this->model->create($data);
        header('location: '.URL.'msuser');
    }
    public function edit($id){
        $this->view->msuListSingle=$this->model->msuListSingle($id);
        $this->view->render('msuser/edit');
    }
    public function saveEdit($id){
        $data=array();
        $data['id']=$id;
        $data['name']=$_POST['name'];
        $data['password']=$_POST['password'];
        $data['password2']=$_POST['password0'];
        //echo $country;
        //@todo: Check Name 
        $this->model->editSave($data);
        
        header('location: '.URL.'msuser');
    }
    public function void($id){
        $this->model->void($id);
        header('location: '.URL.'msuser');
    }
    
}