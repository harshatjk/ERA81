function valid(){
  //  document.getElementById("formError").innerHTML="this is cool";
  var fname = document.getElementById("firstname").value;
  var lname = document.getElementById("lastname").value;
  var email = document.getElementById("email").value;
  var cemail = document.getElementById("confirmemail").value;
  var pwd = document.getElementById("password").value;
  var cpwd = document.getElementById("confirmpassword").value;
  alert(fname);

  if(validateName(fname)){
    if(validateName(lname)){
      if(validateEmail(email)){
        if(validateEmail(cemail)){
          if(compareEmail(email,cemail)){
            if(validatePassword(pwd)){
              if(validatePassword(cpwd)){
                if(comparePassword(pwd,cpwd)){
                  return true;
                }
              }
            }
          }
        }
      }
    }
  }

  //alert(lname);
  //alert(email);
  //alert(cemail);
  //alert(pwd);
  //alert(cpwd);
  return false;
}



function validateName(fname) {
  var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
  if( fname == ""){
    document.getElementById("formError").innerHTML=" (First/Last) Name can't be empty. ";
    return false;
  }
  else if(fname.match(letters)){
    return true;
  }
  else{
    document.getElementById("formError").innerHTML="Only Letter's and Spaces's are allowed for the Name.";
    return false;
  }
}


function validateEmail(email){
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,7})+$/;
  if( email == ""){
    document.getElementById("formError").innerHTML=" Email field can't be empty. ";
    return false;
  }
  else if(!filter.test(email)){
    document.getElementById("formError").innerHTML=" Please provide a valid Email Address. ";
    return false;
  }
  else{
    return true;
  }
}

function compareEmail(email, cemail){
  if(email == cemail){
    return true;
  }
  else{
    document.getElementById("formError").innerHTML=" Email and Confirm Email Id's should be same ";
    return false;
  }
}

function validatePassword(pwd){
  var letters = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,15}$/
  if( pwd == ""){
    document.getElementById("formError").innerHTML=" Password field can't be empty. ";
    return false;
  }
  else if(!letters.test(pwd)){
    alert(pwd);
    document.getElementById("formError").innerHTML=" Password is not as is should be. ";
    return false;
  }
  else{
    return true;
  }
}


function comparePassword(pwd, cpwd){
  if(pwd == cpwd){
    return true;
  }
  else{
    document.getElementById("formError").innerHTML=" Password and Confirm Password should be same. ";
    return false;
  }
}
