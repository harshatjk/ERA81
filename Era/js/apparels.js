$(document).ready(function(){

  $("#jeansShowcase").click(function(){
    $.post("apparels.php", {showCase:"jeans"}, function(result){
        $("#imageShowcase").html(result );
    });
  });

  $("#tshirtsShowcase").click(function(){
    $.post("apparels.php", {showCase:"tshirt"}, function(result){
        $("#imageShowcase").html(result );
    });
  });

  $("#travelbagsShowcase").click(function(){
    $.post("apparels.php", {showCase:"bag"}, function(result){
        $("#imageShowcase").html(result );
    });
  });

  $("#displaySmall").click(function(){
    alert("small");
    $.post("modules.php", {displaySL:"small"}, function(result){
        $("#imageShowcase").html(result );
    });
  });

  $("#displayLarge").click(function(){
    alert("large");
    $.post("modules.php", {displayLG:"large"}, function(result){
        $("#imageShowcase").html(result );
    });
  });

});
