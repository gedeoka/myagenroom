<?php

class Help extends Controllers{

    function __construct() {
        parent::__construct();
    }
    function index(){
        $this->view->render('help/index');
    }
    public function other( $arg = false){
        echo 'Process Other<br>';
        echo 'With Argumen : '.$arg.'<br>';
              
    }
}