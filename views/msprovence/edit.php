

<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Country </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left input_mask" method="POST" action="<?php echo URL; ?>msprovence/saveEdit/<?php echo $this->mspListSingle['ProvinceID']; ?>">                                       

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Province Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="province" class="form-control" value="<?php echo $this->mspListSingle['ProvinceName']; ?>">
                        </div>
                        <div class="clearfix"></div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="cid" class="form-control" placeholder="Select Country">
                                <?php 
                                foreach ($this->mscList as $key => $value) { ?>
                                <option value="<?php echo $value['CountryID'];?>" <?php if($value['CountryID']==$this->mspListSingle['CountryID']) echo 'selected'; ?> ><?php echo $value['CountryName']?></option>
                                <?php }?>

                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

