<script>
		$('document').ready(function(){	
				
			$("#demo").jplist({				
				itemsBox: '.list' 
				,itemPath: '.list-item' 
				,panelPath: '.jplist-panel'	
			});
		});
		</script>
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
                    <div class="gap10"></div>
                    <div class="result-detail">
                        <h3 class="widget-title">Your Search Details</h3>
                        <span class="block"><i class="icon-map-marker mi text-warning"></i><?php echo $this->place;?></span>
                        <span class="block"><i class="icon-calendar mi text-warning"></i>Check In &nbsp; &nbsp;: <?php echo $this->chin;?></span>
                        <span class="block"><i class="icon-calendar mi text-warning"></i>Check Out : <?php echo $this->chout;?></span>
                        
                    </div>		
                    <div class="sidebar-module">
                        <h3 class="widget-title">Search Again</h3>
                        <form class="tour-search" role="form" method="GET" action="<?php echo URL;?>search/" target="">
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
                
                <div class="clear"></div>
                 
                
                <div id="demo" class="box jplist" style="margin: 20px 0 50px 0">
				
					<!-- ios button: show/hide panel -->
					<div class="jplist-ios-button">
						Show / Hide Panel
					</div>
					
					<!-- panel -->
					<div class="jplist-panel box panel-top">						
											
								
						<!-- items per page dropdown -->
						<div 
						   class="jplist-drop-down" 
						   data-control-type="items-per-page-drop-down" 
						   data-control-name="paging" 
                                                   data-control-action="paging" hidden="">
						   
                                                    <ul >
							 <li><span data-number="3"> 3 per page </span></li>
							 <li><span data-number="5"> 5 per page </span></li>
							 <li><span data-number="10" data-default="true"> 10 per page </span></li>
							 <li><span data-number="all"> View All </span></li>
						   </ul>
						</div>
											
						<!-- sort dropdown -->
						<div 
							class="jplist-drop-down" 
							data-control-type="sort-drop-down" 
							data-control-name="sort" 
							data-control-action="sort"
							data-datetime-format="{month}/{day}/{year}"
                                                        hidden=""
                                                        > <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->
												
							<ul>
								<li><span data-path="default">Sort by</span></li>
								<li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
								<li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
								<li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
								<li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
								<li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
								<li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
								<li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
								<li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>
							</ul>
						</div>

						<!-- filter by title -->
						<div class="text-filter-box">
											
							
												
							<!--[if lt IE 10]>
							<div class="jplist-label">Filter by Title:</div>
							<![endif]-->
												
							<input 
								data-path=".title" 
								type="text" 
								value="" 
								placeholder="Filter by Title" 
								data-control-type="textbox" 
								data-control-name="title-filter" 
								data-control-action="filter"
							/>
						</div>
											
						<!-- filter by description -->
						<div class="text-filter-box">
												
							
												
							<!--[if lt IE 10]>
							<div class="jplist-label">Filter by Description:</div>
							<![endif]-->
												
							<input 
								data-path=".desc" 
								type="text" 
								value="" 
								placeholder="Filter by Description" 
								data-control-type="textbox" 
								data-control-name="desc-filter" 
								data-control-action="filter"
							/>	
						</div>
						
						<!-- views -->
                                                <div hidden="" 
						   class="jplist-views" 
						   data-control-type="views" 
						   data-control-name="views" 
						   data-control-action="views"
						   data-default="jplist-list-view">
						   
						   <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button>
						   <button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button>
						   <button type="button" class="jplist-view jplist-thumbs-view" data-type="jplist-thumbs-view"></button>
						</div>	
						
						<!-- pagination results -->
						<div 
						   class="jplist-label" 
						   data-type="Page {current} of {pages}" 
						   data-control-type="pagination-info" 
						   data-control-name="paging" 
						   data-control-action="paging">
						</div>
												
						<!-- pagination control -->
						<div 
						   class="jplist-pagination" 
						   data-control-type="pagination" 
						   data-control-name="paging" 
						   data-control-action="paging">
						</div>
						
					</div>		
                                        
					<div class="gap30"></div>
                                        <div class="border-bottom"></div>
					<!-- data -->   
					<div class="list box text-shadow">					
						
						<!-- item 1 -->
                                                 <?php
                                                
                                                $startx=  explode('/', $this->chin);
                                                $in=$startx[2].'f'.$startx[1].'f'.$startx[0];
                                                $endx=  explode('/', $this->chout);
                                                $out=$endx[2].'f'.$endx[1].'f'.$endx[0];
                                                foreach ($this->hList as $key => $value) {
                                                    $roomid=Code::GetField("roomprice", "RoomID", " ProfileID='".$value['ProfileID']."' and StartDate='".$value['StartDate']."' and EndDate='".$value['EndDate']."' and Normal='".$value['price']."'");
                                                    $img=Code::GetField("room", "Image", " ProfileID='".$value['ProfileID']."' and RoomID='".$roomid."'");     
                                                    $Rate=Code::GetField("roomprice", "Rate", " ProfileID='".$value['ProfileID']."' and RoomID='".$roomid."'");
                                                    ?>
						<div class="list-item box">		
						
							<!-- img -->
							<div class="img">
								<img src="<?php 
                                                                
                                                                //echo $roomid;
                                                                    
                                                                    echo URL.$img;
                                                                     ?>" alt="" title=""/>
							</div>
							
							<!-- data -->
							<div class="block">
								<p class="ratings <?php 
                                                                switch ($value["Star"]){
                                                                case 1:
                                                                    echo "rating-10";
                                                                    break;
                                                                case 2:
                                                                    echo "rating-20";
                                                                    break;
                                                                case 3:
                                                                    echo "rating-30";
                                                                    break;
                                                                case 4:
                                                                    echo "rating-40";
                                                                    break;
                                                                case 4:
                                                                    echo "rating-50";
                                                                    break;
                                                                }
                                                                
                                                                ?>"></p>
                                                                <p class="title"><a href="<?php echo URL."details/?detail=".$value["Name"]."`".$in."`".$out."`".$value["ProfileID"]."`".$roomid;?>"><?php echo $value["Name"];?></a></p>
                                                                <p class="desc"><span class="hotel-location"><i class="icon-map-marker"></i> <?php echo $value["Address"]."<br>".$value["AreaName"].",".$value["ProvinceName"].",".$value["CountryName"];?></span></p>
                                                                <p class="theme">
									<?php 
                                                                        
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='50'")==1){
                                                                            echo "<img Title='Free Wifi' src='".URL."include/images/ico/wifi.jpg' height=25px width=25px > ";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='36'")==1){
                                                                            echo "<img src='".URL."include/images/ico/gym.jpg' height=25px width=25px title='Gymnasium'> ";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='11'")==1){
                                                                            echo "<img src='".URL."include/images/ico/kidsclub.jpg' height=25px width=25px title='Kids Club'> ";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='35'")==1){
                                                                            echo "<img src='".URL."include/images/ico/parking.jpg' height=25px width=25px title'Parking Area'> ";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='29'")==1){
                                                                            echo "<img src='".URL."include/images/ico/roomservice.jpg' height=25px width=25px title='Layanan Kamar'> ";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='18'")==1){
                                                                            echo "<img src='".URL."include/images/ico/restourant.jpg' height=25px width=25px title='Restaurant'> ";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='9'")==1){
                                                                            echo "<img src='".URL."include/images/ico/wifi.jpg' height=25px width=25px title='Outdoor Pool'>";  
                                                                        }
                                                                        if (Code::requery("profilef", "ProfileID", "ProfileID='".$value["ProfileID"]."' and FasilityID='19'")==1){
                                                                            echo "<img src='".URL."include/images/ico/coffeeshop.jpg' height=25px width=25px title='Coffee Shop'>";  
                                                                        }
                                                                        
                                                                        ?>
                                                                    
								</p>
								
							</div>
                                                        <div class="bottom">
                                                            <span class="large-price"><small>From <br><span style="text-decoration:line-through;"><?php echo number_format($Rate);?> IDR</span></small><br>IDR<br> <?php echo number_format($value["price"]);?> </span>
                                                                <a href="<?php echo URL."details/?detail=".$value["Name"]."`".$in."`".$out."`".$value["ProfileID"]."`".$roomid;?>" class="link">Details</a>
                                                        </div>
						</div>
						
						<?php 
                                                } ?>
                                                
						
					</div>	
					
					<div class="box jplist-no-results text-shadow align-center">
						<p>No results found</p>
					</div>
								
				</div>
                <div class="clear"></div>
                

            </div>
        </div>
    </div>
</div>
