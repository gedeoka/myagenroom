
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Set Price</h2>                                    
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <form action="" method="POST" enctype="multipart/form-data" name="myForm" id="myForm" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Type</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="name" name="name" placeholder="Room Type" type="text" required value="<?php
                            echo Code::GetField("room", "RoomName", " ProfileID='".($this->pProfileID)."' and RoomID='".($this->pRoomID)."' ")
                            ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Periode</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input  id="datepicker" name="start" placeholder="Start Periode" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">End Periode</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input  id="datepicker2" name="end" placeholder="End Periode" type="text" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Normal (USD)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="rate" name="rate" placeholder="Price" type="text" required>
                            <small>Standart Rate</small><br>&nbsp;
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Sales Rate (USD)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control" id="prate" name="prate" placeholder="Normal Rate" type="text" required>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contract Rate (USD)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input class="form-control" id="contract" name="contract" placeholder="Contract Rate" type="text" required>
                        </div>
                    </div>
                    <input class="form-control" id="agent" name="agent" placeholder="Agent  Rate" type="Hidden" value="0">
                    
                    <input id="ProfileID" type="hidden" name="ProfileID" value="<?php echo $this->pProfileID;?>">
                    <input id="RoomID" type="hidden" name="RoomID" value="<?php echo $this->pRoomID;?>">
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
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Price</h2><br><br>
                        <p>[ <a href="<?php echo URL;?>prroom">back</a> ]</p>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tableData" class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                    <th class="column-title">ID </th>
                    <th class="column-title">Room Type</th>
                    <th class="column-title">Start Periode </th>
                    <th class="column-title">End Periode </th>
                    <th class="column-title">Standart Rate </th>
                    <th class="column-title">Max Sales Rate</th>
                    <th class="column-title">Contract Rate</th>
                                     
                    </th>
                    <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                    </tr>
                    </thead>

                    <tbody>
                         <?php
                        foreach ($this->ppricelist as $key => $value) {
                            ?>
                        <tr class="even pointer">                            
                            <td class=" "><?php echo $value['RoomID']; ?></td>
                            <td class=" "><?php echo $value['RoomName']; ?> </td>
                            <td class=" "><?php echo date("d/m/Y",strtotime($value['StartDate'])); ?></td>
                            <td class=" "><?php echo date("d/m/Y",strtotime($value['EndDate'])); ?></td> 
                            <td class=" "><?php echo $value['Rate']; ?></td>
                            <td class=" "><?php echo $value['Normal']; ?></td>
                            <td class=" "><?php echo $value['Contract']; ?></td>                            
                           
                                                       
                        </tr>
                        <?php } ?>
                       
                       
                    </tbody>

                </table>

                </div>
            </div>
        </div>
        
        
    </div>
</div>

<style>
    #selectedimage img{
        height: 150px;
        width: 150px;
    }
</style>
<link rel="stylesheet" href="<?php echo URL;?>css/jquery.css.ui.css">
<script>

$(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "dd/mm/yy",
        minDate: +1
    });
  });
$(function() {
    $( "#datepicker2" ).datepicker({
        dateFormat: "dd/mm/yy",
        minDate: +1
    });
  });


$('#myForm').submit(function(){
    var data= $(this).serialize();
    //alert(data);
    //check data
     $.post("../pcekprice",data,function(x){
       if(x==0){
           $.post("../paddprice",data,function(x){
                var myRow = "<tr class='even pointer'> <td class=' '>" 
                        + document.getElementById("RoomID").value + "</td><td class=' '>" 
                        + document.getElementById("name").value + "</td><td class=' '>" 
                        + document.getElementById("datepicker").value + "</td><td class=' '>" 
                        + document.getElementById("datepicker2").value + "</td><td class=' '>" 
                        + document.getElementById("rate").value + "</td> <td class=' '>" 
                        + document.getElementById("prate").value + "</td><td class=' '>" 
                        + document.getElementById("agent").value + "</td><td class=' '>" 
                        + document.getElementById("contract").value +"</td></tr>";
            $("#tableData > tbody > tr:last ").after(myRow);
            
            $("#datepicker").val("");
            $("#datepicker2").val("");
            $("#rate").val("");
            $("#prate").val("");
            $("#agent").val("");
            $("#contract").val("");
           });
       }else{
           alert("Data sudah ada sebelumnya harap cek kembali!!!");
       }
       
    });
    return false;
});
</script>
<script src="<?php echo URL;?>js/jquery.sortelements.js" type="text/javascript"></script>
<script src="<?php echo URL;?>js/jquery.bdt.js" type="text/javascript"></script>
<script>
    $(document).ready( function () {
        $('#tableData').bdt();
    });
</script>
<script type="text/javascript" src="<?php echo URL;?>js/datepicker/daterangepicker.js"></script>