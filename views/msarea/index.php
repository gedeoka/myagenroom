
<div class="right_col" role="main">

    <div class="clearfix"></div>


    <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Area </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left input_mask" method="POST" action="<?php echo URL; ?>msarea/create">                                       

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Area Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="area" class="form-control" placeholder="Area Name">
                        </div>
                        <div class="clearfix"></div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select id="cid" name="cid" class="form-control" placeholder="Select Country">
                                <option value="">Select Country</option>
                                <?php 
                                foreach ($this->mscList as $key => $value) { ?>
                                <option value="<?php echo $value['CountryID']?>"><?php echo $value['CountryName']?></option>
                                <?php }?>

                            </select>
                        </div><div class="clearfix"></div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Province</label>
                        <div  class="col-md-9 col-sm-9 col-xs-12">
                            <select id="pid" name="pid" class="form-control" placeholder="Select Province">
                                <?php 
                                foreach ($this->mspList as $key => $value) { ?>
                                <option rel="<?php echo $value['CountryID']?>" value="<?php echo $value['ProvinceID']?>"><?php echo $value['ProvinceName']?></option>
                                <?php }
                                  ?>
                                 

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



    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Area</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
 <style type="text/css">

.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;
}

.paging-nav,
#tableData {
  width: 100%;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}
</style>               


                <table id="tableData" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Province</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->msaList as $key => $value) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $value['AreaID']; ?></th>
                                <td><?php echo $value['AreaName']; ?></td>
                                <td><?php echo $value['CountryName']; ?></td>
                                <td><?php echo $value['ProvinceName']; ?></td>
                                <td><a href="<?php echo URL;?>msarea/edit/<?php echo $value['AreaID']; ?>"> Edit </a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
            
                       
        </div>
    </div>
</div>

