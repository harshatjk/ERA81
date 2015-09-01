function validate(){
alert("Hi");
  var c_old_pwd = document.getElementById("oldPassword").value;
  var c_new_pwd = document.getElementById("newPassword").value;
  var c_new_cpwd = document.getElementById("confirmNewPassword").value;
  alert(c_old_pwd);
  if(validatePassword(c_old_pwd)){
    if(validatePassword(c_new_pwd)){
      if(validatePassword(c_new_cpwd)){
        if(comparePassword(c_new_pwd,c_new_cpwd)){
          alert("Done");
          return true;
        }
      }
    }
  }
  return false;
}

function validatePassword(pwd){
  var letters = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,15}$/
  if( pwd == ""){
    document.getElementById("changepassworderror").innerHTML=" Password field can't be empty. ";
    return false;
  }
  else if(!letters.test(pwd)){
    alert(pwd);
    document.getElementById("changepassworderror").innerHTML=" Password is not as is should be. ";
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
    document.getElementById("changepassworderror").innerHTML=" Password and Confirm Password should be same. ";
    return false;
  }
}
