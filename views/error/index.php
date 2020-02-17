<div id="home" class="body-wrapper">
    <div class="little-head">
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


    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="sidebar">
                    		
                    <div class="sidebar-module">
                        <h3 class="widget-title">Search Again</h3>
                        <form class="tour-search" role="form" method="GET" action="<?php echo URL;?>search/">
                            <div class="full-fourth">
                                <div class="form-group">
                                    <label for="place">Nama Lokasi / Hotel Tujuan <span class="star"></span></label>
                                        <input type="text" name="place" class="form-control" id="place" placeholder="Where you want to stay">
                                </div>
                            </div>
                            <div class="two-fourth mr">
                                <div class="datepicker-wrapper">	
                                    <div class="form-group datepicker-wrapper">
                                        <label for="check-in-hotel">Check-in <span class="star"></span></label>
                                        <input required name="checkin" type="text" class="form-control date" id="check-in-hotel" placeholder="dd/mm/yy">
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="two-fourth">
                                <div class="datepicker-wrapper">	
                                    <div class="form-group datepicker-wrapper">
                                        <label for="check-out-hotel">Check-out <span class="star"></span></label>
                                        <input required name="checkout" type="text" class="form-control date" id="check-out-hotel" placeholder="dd/mm/yy">
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="three-fourth mr">
                                <div class="form-group">
                                    <span>Rooms</span>
                                    <select name="room" class="form-control mySelectBoxClass">
                                        <option>1</option>
                                        <option selected>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="three-fourth mr">
                                <div class="form-group">
                                    <span>Adult</span>
                                    <select name="adult" class="form-control mySelectBoxClass">
                                        <option>1</option>
                                        <option selected>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>							
                            <div class="three-fourth">
                                <div class="form-group">
                                    <span>Child</span>
                                    <select name="child" class="form-control mySelectBoxClass">
                                        <option>0</option>
                                        <option selected>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix gap10"></div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="icon-search icon-flip-horizontal"></i> Search
                            </button>
                        </form>
                    </div>

                    <div class="gap20"></div>
                    
                   
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-9">

                <div class="gap20"></div>
                <h2>Page Error</h2>
                <p>I'm Sorry.<br>
we cannot find the page that you request.</p>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
