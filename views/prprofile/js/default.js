$(window).load(function(e) {
   
    
    var opt1 = $("#pid").html();
    var text1 = $("#cid :selected").val();
    $("#pid").html(opt1);
    if (text1 == "All")   return;
    $('#pid :not([rel="' + text1.substr(0, 3) + '"])').remove();
    $('#aid :not([rels="' + text1.substr(0, 3) + '"])').remove();
   
     
    
     
});
$(function(){
    
     var options = $("#pid").html();   
    
    $("#cid").change(function(e) {
        
        var text = $("#cid :selected").val();
        $("#pid").html(options);
        if(text == "All") return;
        $('#pid :not([rel="' + text + '"])').remove();
       
        $('#aid :not([rels="' + text + '"])').remove();
    })
    var opti1 = $("#aid").html();   
    
    $("#pid").change(function(x) {
        
        var tex = $("#pid :selected").val();
        $("#aid").html(opti1);        
        $('#aid :not([rels="' + tex.substr(0, 3) + '"])').remove();
    })
    
});
