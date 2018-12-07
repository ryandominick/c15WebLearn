//Set default value for if password is clicked
var passwordClicked = false;

function showHidePass() {
  var getLoginInput = document.getElementById("passwordClicked");

  if(passwordClicked === false) {
    //If button is clicked, change to 'text' type to see what password is
    getLoginInput.setAttribute("type", "text");
    passwordClicked = true;

  } else if (passwordClicked === true) {
    //If button is clicked again, change from 'text' type to 'password'
    getLoginInput.setAttribute("type", "password");
    passwordClicked = false;
  }
}
