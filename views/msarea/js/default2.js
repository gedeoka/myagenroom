 $(window).load(function(e){
     var options = $("#pid").html();
        var text = $("#cid :selected").val();
        $("#pid").html(options);
        if(text == "All") return;
        $('#pid :not([rel="' + text.substr(0, 3) + '"])').remove();
    });


$(function(){
    
    var options = $("#pid").html();
    $("#cid").change(function(e) {
        var text = $("#cid :selected").val();
        $("#pid").html(options);
        if(text == "All") return;
        $('#pid :not([rel="' + text.substr(0, 3) + '"])').remove();
    })
    
});
