 
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Partner  <small> [ <a href="<?php echo URL;?>mspartner/add">Add New</a> ]</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tableData" class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                    <th class="column-title">ID </th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Username </th>
                    <th class="column-title">Status </th>
                    <th class="column-title">Profile </th>
                    <th class="column-title">Gallery </th>
                    <th class="column-title">Room </th>                                       
                    <th class="column-title">Edit </th>
                    <th class="column-title no-link last"><span class="nobr">Void</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                    </tr>
                    </thead>

                    <tbody>
                         <?php
                        foreach ($this->msuList as $key => $value) {
                            ?>
                        <tr class="even pointer">                            
                            <td class=" "><?php echo $value['userID']; ?></td>
                            <td class=" "><?php echo $value['Name']; ?> </td>
                            <td class=" "><?php echo $value['username']; ?></td>
                            <td class=" "><?php if($value['aktif']==1){ echo 'Aktif';}else{echo 'Non-Aktif';} ?></td>
                            <td class=" "><a href='<?php echo URL;?>mspartner/profile/<?php echo $value['ProfileID']; ?>'> View </a></td>
                            <td class=" "><a href='<?php echo URL;?>mspartner/gallery/<?php echo $value['ProfileID']; ?>'> Gallery </a></td>
                            <td class=" "><a href='<?php echo URL;?>mspartner/product/<?php echo $value['ProfileID']; ?>'> Room </a></td>                            
                            <td class=" "><a href='<?php echo URL;?>mspartner/edit/<?php echo $value['userID']; ?>'> Edit </a></td>
                            <td class=" last"><a href="<?php echo URL;?>mspartner/void/<?php echo $value['userID']; ?>">Void</a>
                            </td>
                        </tr>
                        <?php } ?>
                       
                       
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<script src="<?php URL;?>js/jquery.sortelements.js" type="text/javascript"></script>
<script src="<?php URL;?>js/jquery.bdt.js" type="text/javascript"></script>
<script>
    $(document).ready( function () {
        $('#tableData').bdt();
    });
</script>