<div id="home" class="body-wrapper">
    <div class="little-head">
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo URL; ?>include/images/logo.png" alt="logo"></a>
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



<!-- SLIDER -->
<div class="slider-1 clearfix">

    <div class="flex-container">
        <div class="flexslider loading">
            <ul class="slides">
                <li style="background:url(<?php echo URL; ?>include/images/slider/slider-bg-01.jpg) no-repeat;background-position:50% 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 contain">

                                <h2 data-toptitle="23%"></h2>
                                <p data-bottomtext="53%"></p>

                            </div>
                        </div>
                    </div><!-- End Container -->

                </li><!-- End item -->

                <li style="background:url(<?php echo URL; ?>include/images/slider/slider-bg-02.jpg) no-repeat; background-position:50% 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 contain">

                                <h2 data-toptitle="23%"></h2>
                                <p data-bottomtext="53%"></p>

                            </div>
                        </div>
                    </div><!-- End Container -->

                </li><!-- End item -->

                <li style="background:url(<?php echo URL; ?>include/images/slider/slider-bg-03.jpg) no-repeat; background-position:50% 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 contain">

                                <h2 data-toptitle="23%"></h2>
                                <p data-bottomtext="53%"></p>

                            </div>
                        </div>
                    </div><!-- End Container -->

                </li><!-- End item -->

            </ul>
        </div>
    </div>
</div><!-- End slider -->


<div class="main-wrapper">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trip-search">

                    <div class="tab_container">									
                        <div id="hotel-tab" class="tab_content trip-form1">                            
                            <form role="form" id="myForm" action="<?php echo URL; ?>search/" method="GET">
                                <div class="normal">
                                    <div class="form-group">
                                        <label for="place">Nama Lokasi / Hotel Tujuan <span class="star"></span></label>
                                        <input type="text" name="place" class="form-control" id="place" placeholder="Where you want to stay">
                                    </div>
                                </div>
                                <div class="datepicker-wrapper">	
                                    <div class="form-group datepicker-wrapper">
                                        <label for="check-in-hotel">Check-in <span class="star"></span></label>
                                        <input required type="text" name="checkin" class="form-control date" id="check-in-hotel" placeholder="dd/mm/yy">
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                                <div class="datepicker-wrapper no-rs-mr">
                                    <div class="form-group datepicker-wrapper">
                                        <label for="check-out-hotel">Check-out <span class="star"></span></label>
                                        <input required type="text" name="checkout" class="form-control date" id="check-out-hotel" placeholder="dd/mm/yy">
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                                
                                
                                <div class="link">
                                    <a href="#" style="line-height: 30px; font-size: 13px;">&nbsp;</a>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="icon-search icon-flip-horizontal"></i> Search
                                    </button>
                                </div>
                            </form>                                       
                        </div>

                    </div>	
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>


</div><!-- /main-wrapper -->


