<?php

class PrProfile extends Controllers{
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
        $id=$profileid[0]['ProfileID'];
        $this->view->pmsPListSingle=$this->model->pmsPListSingle($id);
        $this->view->pmscList=$this->model->pmscList();
        $this->view->pmspList=$this->model->pmspList();
        $this->view->pmsaList=$this->model->pmsaList();
        $this->view->pfasList=$this->model->pfasList($id);
        $this->view->pDfas1=$this->model->pDfas1();
        $this->view->pDfas2=$this->model->pDfas2();
        $this->view->pDfas3=$this->model->pDfas3();
        $this->view->pDfas4=$this->model->pDfas4();
        $this->view->msCcList=$this->model->msCcList();
        $this->view->js=array('prprofile/js/default.js');
        $this->view->render('prprofile/index');
    }
    
     public function pEditProfile($id){
        $data=array();
        $data['profileID']=$id;
        $data['name']=$_POST['name'];
        $data['address']=$_POST['address'];
        $data['phone']=$_POST['phone'];
        $data['fax']=$_POST['fax'];
        $data['website']=$_POST['website'];
        $data['star']=$_POST['star'];
        $data['country']=$_POST['cid'];
        $data['checkin']=$_POST['checkin'];
        $data['checkout']=$_POST['checkout'];
        $data['cat']=$_POST['cat'];
        $data['province']=$_POST['pid'];
        $data['area']=$_POST['aid'];
        $data['deng']=$_POST['deng'];
        $data['dina']=$_POST['dina'];
        $data['dchn']=$_POST['dchn'];
        $data['zipcode']=$_POST['zipcode'];
        $data['latmap']=$_POST['latmap'];
        $data['longmap']=$_POST['longmap'];
        
        $this->model->pEditProfile($id,$data);
        $this->view->pmsPListSingle=$this->model->pmsPListSingle($id);
        $this->view->pmscList=$this->model->pmscList();
        $this->view->pmspList=$this->model->pmspList();
        $this->view->pmsaList=$this->model->pmsaList();
        $this->view->pfasList=$this->model->pfasList($id);
        $this->view->pDfas1=$this->model->pDfas1();
        $this->view->pDfas2=$this->model->pDfas2();
        $this->view->pDfas3=$this->model->pDfas3();
        $this->view->pDfas4=$this->model->pDfas4();
        header('location: '.URL.'prprofile');
    }
    
}