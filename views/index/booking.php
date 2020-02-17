<style>
    .CSSTableGenerator {
        margin:0px;padding:0px;
        width:100%;
        border:1px solid #ffffff;

        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;

        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;

        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;

        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }.CSSTableGenerator table{
        border-collapse: collapse;
        border-spacing: 0;
        width:100%;
        height:100%;
        margin:0px;padding:0px;
    }.CSSTableGenerator tr:last-child td:last-child {
        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:first-child {
        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:last-child {
        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;
    }.CSSTableGenerator tr:last-child td:first-child{
        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;
    }.CSSTableGenerator tr:hover td{

    }
    .CSSTableGenerator tr:nth-child(odd){ background-color:#ffffff; }
    .CSSTableGenerator tr:nth-child(even)    { background-color:#60a2e5; }.CSSTableGenerator td{
        vertical-align:middle;


        border:1px solid #ffffff;
        border-width:0px 1px 1px 0px;
        text-align:center;
        padding:7px;
        font-size:12px;
        font-family:Arial;
        font-weight:normal;
        color:#000000;
    }.CSSTableGenerator tr:last-child td{
        border-width:0px 1px 0px 0px;
    }.CSSTableGenerator tr td:last-child{
        border-width:0px 0px 1px 0px;
    }.CSSTableGenerator tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
    }
    .CSSTableGenerator tr:first-child td{
        background:-o-linear-gradient(bottom, #5685b5 5%, #5685b5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5685b5), color-stop(1, #5685b5) );
        background:-moz-linear-gradient( center top, #5685b5 5%, #5685b5 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5685b5", endColorstr="#5685b5");	background: -o-linear-gradient(top,#5685b5,5685b5);

        background-color:#5685b5;
        border:0px solid #ffffff;
        text-align:center;
        border-width:0px 0px 1px 1px;
        font-size:14px;
        font-family:Arial;
        font-weight:bold;
        color:#ffffff;
    }
    .CSSTableGenerator tr:first-child:hover td{
        background:-o-linear-gradient(bottom, #5685b5 5%, #5685b5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5685b5), color-stop(1, #5685b5) );
        background:-moz-linear-gradient( center top, #5685b5 5%, #5685b5 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5685b5", endColorstr="#5685b5");	background: -o-linear-gradient(top,#5685b5,5685b5);

        background-color:#5685b5;
    }
    .CSSTableGenerator tr:first-child td:first-child{
        border-width:0px 0px 1px 0px;
    }
    .CSSTableGenerator tr:first-child td:last-child{
        border-width:0px 0px 1px 1px;
    }
</style>
<div class="body-wrapper">  <div class="little-head">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="logo">
                        <a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>include/images/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="little-menu">
                        <a href="<?php echo URL; ?>login" title="Open Modal window" data-toggle="modal" class="btn">Login</a>
                        <a href="<?php echo URL; ?>register" title="Open Modal window" data-toggle="modal" class="btn" >Register</a>

                    </div><!-- end little-menu -->
                    <div class="call-us">
                        Call Us Today: (+62) 361 - XXXXXX
                    </div>	
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end little head -->

    <div class="main-wrapper">

        <div class="v-card">
            <div class="container">
                <div class="title">
                    <h2><?php echo $this->hotelname; ?></h2>
                    <p class="hotel-location"><i class="icon-map-marker"></i> <?php echo $this->address; ?></p>
                    <span class="rating-static rating-<?php echo $this->star; ?>0"></span>
                </div>

                <div class="inner">
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="left">
                                    <h4 class="section-title">Booking Information</h4>
                                    
                                    <h5>Member Login</h5>
                                    <div class="gap10"></div>
                                    <?php
                                    if (isset($_GET["err"])){
                                        if($_GET["err"]==2){
                                            echo "Login Failed<br>USERNAME and PASSWORD are not Macth!!";
                                        }
                                    }
                                    ?>
                                    <form id="Myform" name="Myform" action="<?php echo URL;?>booking/login" method="POST">
                                    <div class="form-group">
                                        <label for="first-name" class="col-lg-4 control-label">User Name: </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="login" class="form-control" id="first-name" placeholder="User Name" required="">
                                            <div id="Erlogin">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="col-lg-4 control-label">Password: </label>
                                        <div class="col-lg-8">
                                            <input type="password" name="password" class="form-control" id="middle-name" placeholder="Password">
                                            <div id="Erpass">
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-lg-8">
                                            <input type="Submit" class="btn btn-primary submit-button" id="Submit" value="Login" >
                                            <input type="hidden" class="form-control" id="xHR" name="xHR" value="<?php echo $_GET["xHR"];?>">
                                        </div>
                                    </div>
                                    </form>
                                    <div class="gap20"></div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="right">
                                    <h4 class="section-title">Booking Summary</h4>
                                    <h5>Summary</h5>
                                    <ul class="list-summary">
                                        <li><span>Room</span> <?php echo $this->roomname; ?></li>										
                                        <li><span>Check in</span> <?php echo $this->din; ?></li>
                                        <li><span>Check out</span> <?php echo $this->dout; ?></li>
                                        <li><span>Guests</span> <?php echo $this->dewasa; ?> Adult, <?php echo $this->anak; ?> child</li>
                                        <li><span>Number of Room</span> <?php echo $this->roomno; ?></li>
                                    </ul>
                                    <div class="gap10"></div>
                                    <h5>Charge</h5>
                                    <div class="CSSTableGenerator" >
                                        <table>

                                            <tr>
                                                <td> Tanggal </td>
                                                <td> Harga </td>
                                                <td> Jumlah Kamar </td>
                                                <td> Total </td>
                                            </tr>

                                            <?php
                                            $total = 0;
                                            foreach ($this->Order as $key => $values) {
                                                $tgl = explode("-", $values["tgl"]);
                                                $tgl = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
                                                echo "<tr><td> " . $tgl . " </td><td> " . number_format($values["normal"]) . " IDR</td><td> " . $this->roomno . " </td><td> " . number_format($values["normal"] * $this->roomno) . " IDR</td></tr>";
                                                $total = $total + (($values["normal"] * $this->roomno));
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="3"> <b>Total </b></td>
                                                <td><b> <?php echo number_format($total); ?> IDR</b> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"> <b>VAT </b></td>
                                                <td><b>Included</b> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"> <b>Fees </b></td>
                                                <td><b><b>Included</b> </b> </td>
                                            </tr>
                                            
                                        </table>
                                    </div>

                                    <div class="gap20"></div>
                                   
                                    
                                    <div class="gap10"></div>
                                    <div class="total-price">
                                        <strong>Grand Total:  </strong><span> <?php echo number_format($total); ?> IDR</b></span>
                                    </div>
                                    <div class="gap10"></div>
                                    
                                </div>
                            </div>
                        </div>
                   
                </div>

            </div>
        </div>

    </div><!-- /main-wrapper -->
    <script>
    /*!
    * Check Login
    ** JQuery to Login
    * License: MIT
    *
    */
    function myFunction(){
        var log=0;
        
        var login = document.getElementsByName("login")[0].value;        
        var password = document.getElementsByName("password")[0].value;
        $("#Erlogin").empty();
        $("#Erpass").empty();
        if (login==""){
            $("#Erlogin").append("<p>Please Input Your Username</p>");
            log=log+1;
        }
        
        if (password==""){
            $("#Erpass").append("<p>Please Input Your Password</p>");
            log=log+1;
        }
        //var data = $(this).serialize();
        if (0==log){
            $.post("./login",{'login':login,'password':password},function(x){
                alert(x);
            });
        }
    };
    </script>
    
    
