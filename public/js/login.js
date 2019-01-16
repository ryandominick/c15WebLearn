
document.addEventListener("DOMContentLoaded", function (event) {

//Set default value for if password is clicked

//document.addEventListener("click", function(){alert("works");});



let checkbox = document.getElementById("checkbox1");
let loginForm = document.getElementById("loginForm");
let studentRadio = document.getElementById("stuRadio");
let teacherRadio = document.getElementById("teaRadio");

checkbox.addEventListener("CheckboxStateChange", showHidePass);
teacherRadio.addEventListener("RadioStateChange", onRadioStateChange);
studentRadio.addEventListener("RadioStateChange", onRadioStateChange);



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



function onRadioStateChange(event) {
    let radio = event.target;
    if (radio.checked && radio.value === "student") {
        loginForm.action = "/student/login"
        //alert(loginForm.action);

    } else if (radio.checked && radio.value === "teacher") {
        loginForm.action = "/teacher/login"
        //alert(loginForm.action);
    }
}

});
