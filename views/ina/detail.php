<script language="javascript" type="text/javascript">
function showHide(shID) {
    
   if (document.getElementById(shID)) {
       
      if (document.getElementById(shID).style.display == 'none') {
         document.getElementById(shID).style.display = 'block';
      }
      else {
         document.getElementById(shID).style.display = 'none';
      }
   }
}
function ReqBook(arg){
    var all=arg;
    var dat=all.split(",");
    var e = document.getElementById("R"+dat[0]);
    var Rm = e.options[e.selectedIndex].value;
    var ee = document.getElementById("D"+dat[0]);
    var Ad = ee.options[ee.selectedIndex].value;
    var eee = document.getElementById("A"+dat[0]);
    var ch = eee.options[eee.selectedIndex].value;
    
    ///alert("<?php echo URL;?>booking/?xHR="+dat[0]+"$$"+dat[1]+"$$"+Rm+"$$"+dat[2]+"$$"+dat[3]+"$$"+dat[4]+"$$"+Ad+"$$"+ch);
    window.location ="<?php echo URL;?>ina/booking/?xHR="+dat[0]+"$$"+dat[1]+"$$"+Rm+"$$"+dat[2]+"$$"+dat[3]+"$$"+dat[4]+"$$"+Ad+"$$"+ch
}
</script>

<?php
foreach ($this->data as $key => $value){
?>
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
                    <div class="sidebar-module colored-module">
                        <h3 class="hotel-name"><?php echo $this->name;?></h3>
                        <div class="hotel-location">
                            <i class="icon-map-marker"></i><?php echo $value["ProvinceName"];?>, <?php echo $value["CountryName"];?>
                            <span class="rating-static white <?php 
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
                                                                
                                                                ?>"></span>
                        </div>
                        <div class="tip-arrow"></div>
                    </div>
                    <div class="gap30"></div>		
                    <div class="sidebar-module">
                        <h5>Location:</h5>
                        <p><?php echo $value["Address"];?></p>
                        
                        <div style='overflow:hidden;height:400px;width:100%;'>
                            <div id='gmap_canvas' style='height:400px;width:222px;'></div>
                            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                        </div> 
                       
                    </div>

                    <div class="gap20"></div>
                    
                    <div class="gap10"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-9">
                <div class="gap20"></div>

                <div id="c-carousel">
                    <div id="gallery-wrapper">
                        <div id="inner">
                            <div id="gallery-carousel">
                                <?php
                                    foreach ($this->gallery as $key => $values){
                                    ?>
                                <img src="<?php echo URL.$values["Image"];?>" alt=""/>
                                										
                                    <?php }?>
                            </div>
                            <div id="pager-wrapper">
                                <div id="pager">
                                    <?php
                                    foreach ($this->gallery as $key => $values){
                                    ?>
                                <img src="<?php echo URL.$values["Image"];?>"  width="120" height="68"  alt=""/>
                                										
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <button id="prev_btn2" class="prev2"><img src="<?php echo URL;?>include/images/spacer.html" alt=""/></button>
                        <button id="next_btn2" class="next2"><img src="<?php echo URL;?>include/images/spacer.html" alt=""/></button>	
                    </div>
                </div> <!-- /c-carousel -->

               

                <div class="tab_container">
                     <h4>Pilih Kamar : </h4>    
                        <div id="demo" class="box jplist" >
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
							 <li><span data-number="all"  data-default="true"> View All </span></li>
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
												
                                                    <ul hidden="">
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
                                                <div class="text-filter-box" hidden="">
											
							
												
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
                                                <div class="text-filter-box" hidden="">
												
							
												
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
						   data-control-action="paging"  hidden="">
						</div>
												
						<!-- pagination control -->
						<div 
						   class="jplist-pagination" 
						   data-control-type="pagination" 
						   data-control-name="paging" 
						   data-control-action="paging"  hidden="">
						</div>
						
					</div>	
                        <div class="list box text-shadow">					
						
						<!-- item 1 -->
                                                 <?php
                                                foreach ($this->rooms as $key => $rooms) {
                                                    ?>
						<div class="list-item2 box">		
						
							<!-- img -->
							<div class="img2">
								<img src="<?php echo URL.$rooms["Image"]; ?>" alt="" title="<?php echo $rooms["RoomName"]; ?>"/>
							</div>
							
							<!-- data -->
							<div class="block">
								
                                                                <p class="title"><a href="#"><?php echo $rooms["RoomName"]; ?></a></p>
                                                                <p class="desc">Kapasitas Ruangan : <?php echo $rooms["NoPax"]; ?> &nbsp; &nbsp;     
                                                                    Jumlah Kamar : <select id="R<?php echo $rooms['RoomID']; ?>">
                                                                        <?php for($a=1;$a<=$rooms["NoRoom"];$a++){?>
                                                                        <option value="<?php echo $a;?>"><?php echo $a;?></option>
                                                                        <?php } ?>
                                                                    </select><br>
                                                                    Jumlah Tamu Dewasa <select id="D<?php echo $rooms['RoomID']; ?>">
                                                                        <?php for($aa=1;$aa<=$rooms["MaxG"];$aa++){?>
                                                                        <option value="<?php echo $aa;?>"><?php echo $aa;?></option>
                                                                        <?php } ?> 
                                                                    </select> &nbsp; &nbsp;     
                                                                    Anak <select id="A<?php echo $rooms['RoomID']; ?>">
                                                                        
                                                                        <?php for($aaa=0;$aaa<=$rooms["NoRoom"];$aaa++){?>
                                                                        <option value="<?php echo $aaa;?>"><?php echo $aaa;?></option>
                                                                        <?php } ?> 
                                                                    </select>
                                                                </p>
                                                                <a href="#" onclick="showHide('<?php echo $rooms['RoomID']; ?>');return false;"><i class="icon-building"></i> Info Kamar</a>
							</div>
                                                        <div class="bottom">
                                                            <span class="large-price"><small>From <br><span style="text-decoration:line-through;"><?php echo number_format($rooms["Rate"]);?> IDR</span></small><br>IDR<br> <?php echo number_format($rooms["Normal"]);?> </span>
                                                            <a href="#" onclick="ReqBook('<?php echo $rooms['RoomID']; ?>,<?php echo $value['ProfileID']; ?>,<?php echo $rooms['Normal']; ?>,<?php echo $this->chin; ?>,<?php echo $this->chout; ?>')">Book Now</a>
                                                        </div>
                                                        
                                                        <div id="<?php echo $rooms["RoomID"]; ?>" style="display : none; padding:10px">   
								<div class="gap10"></div>
                                                                <h4>Info Kamar : </h4>
								<?php echo $rooms["Note"];?>                              
							</div>
						</div>
						
						<?php 
                                                } ?>
                                                
						
					</div>	
                        </div>
                    </div>
                        <div class="gap10"></div>
                        <div class="tab_container">
                        <h4>Deskripsi <?php echo $this->name;?>: </h4>
                        <?php echo $value["Ina"];?>                          
                        </div>
                  <div class="gap10"></div>
                     <div class="tab_container">
                        <div class="tab_content" style="display: block;">                            
                        <h4>Fasility di <?php echo $this->name;?> : </h4>
                        <ul class="facilities">
                        <?php
                        foreach ($this->fasility as $key => $fasility) {
                        ?>    
                            <li class="checked"><?php echo $fasility["Fasility"];?></li>
                                
                        <?php }?>        
                        </ul>
                        
                </div>
                                            
                        </div>
                
            </div>
        </div>
    </div>
    <div class="gap20"></div>
<?php }?>

 <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

<script type='text/javascript'>
    function init_map(){
        var myOptions = {
            zoom:16,
            center:new google.maps.LatLng(<?php echo $value["LatMap"];?>,<?php echo $value["LongMap"];?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(<?php echo $value["LatMap"];?>,<?php echo $value["LongMap"];?>)
        });
        infowindow = new google.maps.InfoWindow({
            content:'<strong><?php echo $this->name;?></strong>'
        });
        google.maps.event.addListener(marker, 'click', 
                function(){infowindow.open(map,marker);}
                );
        infowindow.open(map,marker);
        }
   google.maps.event.addDomListener(window, 'load', init_map);
   </script>
