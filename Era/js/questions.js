$(document).ready(function(){

    $("#privacypolicy").click(function(){
      $.post("modules.php", {type:"privacypolicy"}, function(result){
          $("#inner-tabs").html(result );
      });
    });
    
    $("#returnpolicy").click(function(){
      $.post("modules.php", {type:"returnpolicy"}, function(result){
          $("#inner-tabs").html(result );
      });
    });

});
