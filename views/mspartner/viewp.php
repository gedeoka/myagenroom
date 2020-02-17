
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Partner Profile  </h2> <br><br> <p>[ <a href="<?php echo URL; ?>mspartner/gallery/<?php echo $this->msPListSingle['ProfileID'];?>">Add Image Gallery</a> ] [ <a href="<?php echo URL; ?>mspartner">Back</a> ] </p>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate="" action="<?php echo URL; ?>mspartner/EditProfile/<?php echo $this->msPListSingle['ProfileID'];?>" class="form-horizontal form-label-left" novalidate="" method="POST">
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Partner Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" name="name"  value="<?php echo $this->msPListSingle['Name'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="address" name="address"  value="<?php echo $this->msPListSingle['Address'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="phone" name="phone"  value="<?php echo $this->msPListSingle['Phone'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fax </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="fax" name="fax"  value="<?php echo $this->msPListSingle['Fax'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Website Address </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="website" name="website"  value="<?php echo $this->msPListSingle['website'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input disabled type="text" name="email" id="first-name" required="required"  value="<?php echo $this->msPListSingle['email'];?>" class="form-control col-md-7 col-xs-12" data-parsley-id="9936"><ul class="parsley-errors-list" id="parsley-id-9936"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Star </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="star" name="star" class="form-control" >
                                        <option value="1" <?php if($this->msPListSingle['Star']==1){ echo "selected";} ?> >1</option>
                                        <option value="2" <?php if($this->msPListSingle['Star']==2){ echo "selected";} ?> >2</option>
                                        <option value="3" <?php if($this->msPListSingle['Star']==3){ echo "selected";} ?> >3</option>
                                        <option value="4" <?php if($this->msPListSingle['Star']==4){ echo "selected";} ?> >4</option>
                                        <option value="5" <?php if($this->msPListSingle['Star']==5){ echo "selected";} ?> >5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                               <select id="cid" name="cid" class="form-control" placeholder="Select Country">
                                <?php 
                                foreach ($this->mscList as $key => $value) { ?>
                                <option value="<?php echo $value['CountryID'];?>" <?php if($value['CountryID']==$this->msPListSingle['CountryID']){ echo "selected";} ?> ><?php echo $value['CountryName'];?></option>
                                <?php }?>

                            </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Province </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="pid" name="pid" class="form-control" placeholder="Select Province" >
                                <?php 
                                foreach ($this->mspList as $key => $value) { ?>
                                <option rel="<?php echo $value['CountryID'];?>" value="<?php echo $value['ProvinceID'];?>" <?php if($this->msPListSingle['ProvinceID']==$value['ProvinceID']){ echo "selected";}?>><?php echo $value['ProvinceName'];?></option>
                                <?php }
                                  ?>
                            </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Area </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="aid" name="aid" class="form-control" placeholder="Select Area">
                                <?php 
                                foreach ($this->msaList as $key => $value) { ?>
                                <option rel="<?php echo $value['CountryID'];?>" rels="<?php echo $value['ProvinceID'];?>"  value="<?php echo $value['AreaID'];?>" <?php if($this->msPListSingle['AreaID']== $value['AreaID']){ echo 'selected';}?> ><?php echo $value['AreaName']?></option>
                                <?php }?>

                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="cat" name="cat" class="form-control" placeholder="Select Area">
                                <?php 
                                foreach ($this->msCcList as $key => $value) { ?>
                                <option value="<?php echo $value['CategoryID'];?>" <?php if($this->msPListSingle['CategoryID']== $value['CategoryID']){ echo 'selected';}?> ><?php echo $value['CategoryName'];?></option>
                                <?php }?>

                                </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description(English) </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea  class="jqte-test" id="deng" name="deng" rows="5"><?php echo $this->msPListSingle['Eng'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description(Indonesia) </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea  class="jqte-test" id="deng" name="dina" rows="5"><?php echo $this->msPListSingle['Ina'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description(China) </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea  class="jqte-test" id="deng" name="dchn" rows="5"><?php echo $this->msPListSingle['Chn'];?></textarea>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">ZipCode </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" name="zipcode"  value="<?php echo $this->msPListSingle['Zipcode'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Normal CheckIn Time  </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="datepicker"  name="checkin"  value="<?php echo $this->msPListSingle['CheckIn'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"> 24 Hour's Format (Ex : 06:30:00)<ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Normal CheckOut Time   </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="datepicker2" name="checkout"  value="<?php echo $this->msPListSingle['CheckOut'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"> 24 Hour's Format (Ex : 15:59:00)<ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lanitude (map) </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" name="latmap"  value="<?php echo $this->msPListSingle['LatMap'];?>" class="form-control col-md-7 col-xs-12" type="text"  data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Longitude (Map) </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" name="longmap"  value="<?php echo $this->msPListSingle['LongMap'];?>" class="form-control col-md-7 col-xs-12" type="text" data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>
                            <div class="x_title">
                                <h2>Fasilitas & Layanan Hotel </h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                            <?php
                            foreach($this->Dfas1 as $key=>$value){
                                if(Code::requery("profilef", "ProfileID", " ProfileID='".$this->msPListSingle['ProfileID']."' and FasilityID='".$value['FasilityID']."'")==1){
                                    $x="Checked";
                                }else{
                                    $x="";
                                }
                            ?>
                            
                            <div class="checkbox">
                                <label class="">
                                    <div class="icheckbox_flat-green checked" style="position: relative;"><input type="checkbox" name="Chk<?php echo $value['FasilityID'];?>" <?php echo $x;?> class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> <?php echo $value['Fasility']?>
                                </label>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                            <div class="x_title">
                                <h2>Aktivitas Olah Raga </h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                            <?php
                            foreach($this->Dfas2 as $key=>$value){
                                if(Code::requery("profilef", "ProfileID", " ProfileID='".$this->msPListSingle['ProfileID']."' and FasilityID='".$value['FasilityID']."'")==1){
                                    $x="Checked";
                                }else{
                                    $x="";
                                }
                            ?>
                            
                            <div class="checkbox">
                                <label class="">
                                    <div class="icheckbox_flat-green checked" style="position: relative;"><input type="checkbox" name="Chk<?php echo $value['FasilityID'];?>" <?php echo $x;?> class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> <?php echo $value['Fasility']?>
                                </label>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                            <div class="x_title">
                                <h2>Internet & Wifi </h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                            <?php
                            foreach($this->Dfas3 as $key=>$value){
                                if(Code::requery("profilef", "ProfileID", " ProfileID='".$this->msPListSingle['ProfileID']."' and FasilityID='".$value['FasilityID']."'")==1){
                                    $x="Checked";
                                }else{
                                    $x="";
                                }
                            ?>
                            
                            <div class="checkbox">
                                <label class="">
                                    <div class="icheckbox_flat-green checked" style="position: relative;"><input type="checkbox" name="Chk<?php echo $value['FasilityID'];?>" <?php echo $x;?> class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> <?php echo $value['Fasility']?>
                                </label>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                            <div class="x_title">
                                <h2>Fasilitas Kamar </h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                            <?php
                            foreach($this->Dfas4 as $key=>$value){
                                if(Code::requery("profilef", "ProfileID", " ProfileID='".$this->msPListSingle['ProfileID']."' and FasilityID='".$value['FasilityID']."'")==1){
                                    $x="Checked";
                                }else{
                                    $x="";
                                }
                                
                            ?>
                            
                            <div class="checkbox">
                                <label class="">
                                    <div class="icheckbox_flat-green checked" style="position: relative;"><input type="checkbox" name="Chk<?php echo $value['FasilityID'];?>" <?php echo $x;?> class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> <?php echo $value['Fasility']?>
                                </label>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $this->msPListSingle['ProfileID'];?>">
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                        [ <a href="<?php echo URL; ?>mspartner">Back</a> ] </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
       <script src="<?php echo URL;?>js/Jquery.timepicker.min.js"></script>
<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
        $('#datepicker').timepicker({
            timeFormat: 'HH:mm:ss',
            stepHour: 1,
            stepMinute: 1,
            stepSecond: 1
        });
        $('#datepicker2').timepicker({
            timeFormat: 'HH:mm:ss',
            stepHour: 1,
            stepMinute: 1,
            stepSecond: 1
        });
</script>

    </div>

</div>
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/jquery.css.ui.css" />
<script src="<?php echo URL;?>js/icheck.min.js"></script>