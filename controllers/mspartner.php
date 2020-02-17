<?php

class mspartner extends Controllers{
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
        
        $this->view->render('mspartner/index');
    }
    public function add(){
        $this->view->render('mspartner/add');
    }

    public function create(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['uname']=$_POST['uname'];
        $data['password']=$_POST['password'];
        $data['id']=$_POST['id'];
        $data['dates']=date('Y-m-d H:i:s');
        $this->model->create($data);
        header('location: '.URL.'mspartner');
    }
    public function edit($id=false){
        if($id<>""){
            $this->view->msuListSingle=$this->model->msuListSingle($id);
            $this->view->js=array('mspartner/js/default.js');
            $this->view->render('mspartner/edit');
        }else{
            $this->view->msuList=$this->model->msuList();
            $this->view->render('mspartner/index');
        }
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
        
        header('location: '.URL.'mspartner');
    }
    public function void($id){
        $this->model->void($id);
        header('location: '.URL.'mspartner');
    }
    // Control Profile
    public function profile($id=false){
        if ($id<>"") {
            $this->view->msPListSingle=$this->model->msPListSingle($id);
            $this->view->mscList=$this->model->mscList();
            $this->view->mspList=$this->model->mspList();
            $this->view->msaList=$this->model->msaList();
            $this->view->fasList=$this->model->fasList($id);
            $this->view->Dfas1=$this->model->Dfas1();
            $this->view->Dfas2=$this->model->Dfas2();
            $this->view->Dfas3=$this->model->Dfas3();
            $this->view->Dfas4=$this->model->Dfas4();
            $this->view->msCcList=$this->model->msCcList();
            $this->view->js=array('mspartner/js/default.js');
            $this->view->render('mspartner/viewp');
        }else{
            $this->view->msuList=$this->model->msuList();        
            $this->view->render('mspartner/index');
        }
    }
    //control Edit Profile
    public function EditProfile($id){
        $data=array();
        $data['profileID']=$id;
        $data['name']=$_POST['name'];
        $data['address']=$_POST['address'];
        $data['phone']=$_POST['phone'];
        $data['fax']=$_POST['fax'];
        $data['website']=$_POST['website'];
        $data['star']=$_POST['star'];
        $data['country']=$_POST['cid'];
        $data['cat']=$_POST['cat'];
        $data['checkin']=$_POST['checkin'];
        $data['checkout']=$_POST['checkout'];
        $data['province']=$_POST['pid'];
        $data['area']=$_POST['aid'];
        $data['deng']=$_POST['deng'];
        $data['dina']=$_POST['dina'];
        $data['dchn']=$_POST['dchn'];
        $data['cat']=$_POST['cat'];
        $data['zipcode']=$_POST['zipcode'];
        $data['latmap']=$_POST['latmap'];
        $data['longmap']=$_POST['longmap'];
        
        $this->model->EditProfile($id,$data);
        //$this->view->msuList=$this->model->msuList();
        //$this->view->js=array('mspartner/js/default.js');
        //$this->view->render('mspartner/index');
        header('location: '.URL.'mspartner');
    }
    
    //Control Gallery Profile
    public function gallery($id = false){
        if($id<>""){
        if (isset($_FILES['files'])){
           $this->model->Upload($id);
        }
        $this->view->GalList=$this->model->GalList($id);
        $this->view->msg=$id;
        $this->view->js=array('mspartner/js/upload.js');
        $this->view->render('mspartner/gallery');
        }else{
            $this->view->msuList=$this->model->msuList();
            $this->view->render('mspartner/index');
        }
    }
    
    //Control Delete Gallery
    public function delgal(){
        $this->model->delgal();
    }
    

    //Control add Room
    public function product($id = false){
        if($id<>""){
            if (isset($_FILES['file'])){
               $this->model->addprod($id);
            }
            $this->view->id=$id;
            $this->view->ProdList=$this->model->ProdList($id);        
            $this->view->render('mspartner/product');
            
        }else{
            $this->view->id=$id;
            $this->view->ProdList=$this->model->ProdList($id);        
            $this->view->render('mspartner/product');
        
        }
    }
    
    // Control view Room Price
    public function setprice($id = false){
        $id=  explode('-', $id);
        $this->view->ProfileID=$id[0];
        $this->view->RoomID=$id[1];
        
        $this->view->pricelist=$this->model->pricelist($id[0],$id[1]);
        
        $this->view->render('mspartner/setprice');
    }
    // Control cek Price List
    public function cekprice(){
        $this->view->cekprice=$this->model->cekprice();
    }
    
    //controll Add Room Price
    public function addprice(){
        $this->view->addprice=$this->model->addprice();
    }
    
        
    //Edit Room =============
    public function editroom($id = false){
        $id=  explode('-', $id);
        $this->view->ProfileID=$id[0];
        $this->view->RoomID=$id[1];
        
        $this->view->editroom=$this->model->editroom($id[0],$id[1]);
        
        $this->view->render('mspartner/editroom');
    }
    
    public function seditroom($id = false){
        if ($id){
            $this->model->seditroom($id);
            header('location: '.URL.'mspartner/product/'.$id);
        }else{
            header('location: '.URL.'mspartner');
        }
    }
}