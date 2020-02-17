<?php require 'views/header-adm.php';?>

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
                <form class="form-horizontal form-label-left input_mask" method="POST" action="<?php echo URL; ?>mscountry/saveEdit/<?php echo $this->mscListSingle['CountryID']; ?>">                                       

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Country Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="Country" class="form-control" value="<?php echo $this->mscListSingle['CountryName']; ?>">
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


<?php require 'views/footer-adm.php';?>