function validateLogin(){
  //  document.getElementById("formError").innerHTML="this is cool";
  var email = document.getElementById("Loginemail").value;
  var pwd = document.getElementById("Loginpassword").value;

  //alert(fname);

  if(validateEmail(email)){
    if(validatePassword(pwd)){
      return true;
    }
  }
  return false;
}

  function validateEmail(email){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,7})+$/;
    if( email == ""){
      document.getElementById("loginerror").innerHTML=" Email field can't be empty. ";
      return false;
    }
    else if(!filter.test(email)){
      document.getElementById("loginerror").innerHTML=" Please provide a valid Email Address. ";
      return false;
    }
    else{
      return true;
    }
  }

  function validatePassword(pwd){
    var letters = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,15}$/
    if( pwd == ""){
      document.getElementById("loginerror").innerHTML=" Password field can't be empty. ";
      return false;
    }
    else if(!letters.test(pwd)){
      alert(pwd);
      document.getElementById("loginerror").innerHTML=" Password is not as is should be. ";
      return false;
    }
    else{
      return true;
    }
  }
