document.addEventListener("DOMContentLoaded", function () {

//Set default value for if password is clicked

//document.addEventListener("click", function(){alert("works");});



    let checkbox = document.getElementById("checkbox1");
    let loginForm = document.getElementById("loginForm");
    let studentRadio = document.getElementById("stuRadio");
    let teacherRadio = document.getElementById("teaRadio");


    //Set default value for if password is clicked
    let passwordClicked = false;

    //checkbox.click();

    function showHidePass() {
        let getLoginInput = document.getElementById("passwordClicked");

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

    checkbox.addEventListener("click", showHidePass);
    teacherRadio.addEventListener("click", onRadioStateChange);
    studentRadio.addEventListener("click", onRadioStateChange);



});
