
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
                <form class="form-horizontal form-label-left input_mask" method="POST" action="<?php echo URL; ?>mscountry/create">                                       

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Country Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="Country" class="form-control" placeholder="Country Name">
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
                <h2>List Country</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->mscList as $key => $value) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $value['CountryID']; ?></th>
                                <td><?php echo $value['CountryName']; ?></td>
                                <td><a href="<?php echo URL;?>mscountry/edit/<?php echo $value['CountryID']; ?>"> Edit </a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

