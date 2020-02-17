
$(document).ready(function() {
   $('#tableData').paging({limit:5});  
   
    var options = $("#pid").html();
    
    $("#pid").hide();
    $("#cid").change(function(e) {
        $("#pid").show();
        var text = $("#cid :selected").val();
        $("#pid").html(options);
        if(text == "All") return;
        $('#pid :not([rel="' + text.substr(0, 3) + '"])').remove();
    })
});