$(document).ready(function(){
updateCartSize();

$("#cookieUnset").click(function(){
  $.post("modules.php", {cookieSetting:"unset"}, function(){
  });
});


});

function updateCartSize(){
  $.post("modules.php",{cartSize:"get"},function(val){
    $("#cSize").html(val);
  });
}
