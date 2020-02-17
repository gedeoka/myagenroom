

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Agen Room  | Admin Page</title>

    
<!-- Bootstrap core CSS -->
    <link href="<?php echo URL;?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo URL;?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL;?>css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo URL;?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo URL;?>css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?php echo URL;?>css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URL;?>js/jquery-te-1.4.0.css" rel="stylesheet">
    
   <!----- Jquery.Min.JS
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
   --->
   <script src="<?php echo URL;?>js/jquery.min.js"></script>
    <script  src="<?php echo URL;?>js/jquery.ui.js"></script>
    
    
    
    <?php
        if(isset($this->js)){
            foreach ($this->js as $js){
                echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
                //echo '1';
            }
        }
    ?>
     <script type="text/javascript" src="<?php echo URL;?>js/jquery-te-1.4.0.min.js"></script>
    
   
    
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index" class="site_title"> <span>AgentRoom.com</span></a>
                    </div>
                    <div class="clearfix"></div>

                   

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            
                        <div class="menu_section">
                            
                            <ul class="nav side-menu">
                                <li><a href="index"><i class="fa fa-home"></i> Home</a></li>
                                <li><a><i class="fa fa-windows"></i> Data <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo URL;?>prprofile">My Profile</a>
                                        </li>
                                        <li><a href="<?php echo URL;?>prgallery">Image Gallery</a>
                                        </li>
                                        <li><a href="<?php echo URL;?>prroom">My Room</a>
                                        </li>
                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-laptop"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo URL;?>prbooking">Booking Request</a>
                                        </li>
                                    </ul>
                                </li>
                                </li>
                                <li><a  href="<?php echo URL;?>prbooking"><i class="fa fa-edit"></i> Message </a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user'];?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo URL;?>prprofile">  Profile</a>
                                    </li>
                                    
                                   
                                    <li><a href="<?php echo URL;?>prdashboard/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

    