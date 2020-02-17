<?php

class View{

    function __construct() {
        //echo 'This Is View';
    }
   /*
    public function render($name,$noInclude=false){
        if ($noInclude==true){
            require 'views/'.$name.'.php';
        }else{
            require 'views/header.php';
            require 'views/'.$name.'.php';
            require 'views/footer.php';
        }
    }
     */
   public function render($name){
      
        $TypeID =  Session::get('TypeID');
        if ($TypeID==1){
            require 'views/header-adm.php';
            require 'views/'.$name.'.php';
            require 'views/footer-adm.php';
            exit;
        }elseif ($TypeID==2){
            require 'views/header-pr.php';
            require 'views/'.$name.'.php';
            require 'views/footer-adm.php';
            exit;
        }elseif ($TypeID==3){
            require 'views/header.php';
            require 'views/'.$name.'.php';
            require 'views/footer.php';
            exit;
        }else{
            
            if ($name=="login/index"){
                require 'views/'.$name.'.php';
                
            }else{
                require 'views/header.php';
                require 'views/'.$name.'.php';
                require 'views/footer.php';
                    
            }
        }
        
   }
}

