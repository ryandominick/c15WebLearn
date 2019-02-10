document.addEventListener("DOMContentLoaded", function () {

//Set default value for if password is clicked

//document.addEventListener("click", function(){alert("works");});

    document.getElementById("eyeSlashIcon").addEventListener("click", showPassword);

    let loginForm = document.getElementById("loginForm");
    let studentRadio = document.getElementById("stuRadio");
    let teacherRadio = document.getElementById("teaRadio");


    function showPassword(){
        var showPass = document.getElementById("passwordClicked");
        var passwordStatus = document.getElementById('eyeSlashIcon')
        if (showPass.type === "password") { //If password has been entered, change to type text to make password visible
            showPass.type = "text";
            eyeSlashIcon.style.color = "red";
            passwordStatus.className ='fa fa-eye';
        } else { //If eye icon is pressed again, revert password type text back to password type to hide it.
            eyeSlashIcon.style.color = "#C0C0C0";
            passwordStatus.className ='fa fa-eye-slash';
            showPass.type = "password";
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

    teacherRadio.addEventListener("click", onRadioStateChange);
    studentRadio.addEventListener("click", onRadioStateChange);



});
