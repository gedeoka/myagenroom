
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New User</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate="" action="<?php echo URL; ?>msagent/saveEdit/<?php echo $this->msuListSingle['userID'];?>" class="form-horizontal form-label-left" novalidate="" method="POST">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >UserName <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input disabled type="text" name="uname" id="first-name" required="required"  value="<?php echo $this->msuListSingle['username'];?>" class="form-control col-md-7 col-xs-12" data-parsley-id="9936"><ul class="parsley-errors-list" id="parsley-id-9936"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="password" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="8158"><input type="hidden" name="password0" value="<?php echo $this->msuListSingle['password'];?>" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="8158"><ul class="parsley-errors-list" id="parsley-id-8158" ></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" name="name"  value="<?php echo $this->msuListSingle['Name'];?>" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" data-parsley-id="8567"><ul class="parsley-errors-list" id="parsley-id-8567"></ul>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>