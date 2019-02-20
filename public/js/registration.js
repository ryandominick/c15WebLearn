document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("stuRadio").addEventListener("click", disableInput); //Make student radio buttons function after selection
    document.getElementById("teaRadio").addEventListener("click", disableInput); //Make teacher radio buttons function after selection
    document.getElementById("password").addEventListener("keyup", checkPassword); //Run checkPassword function when user presses a key in password
    document.getElementById("confirmPassword").addEventListener("keyup", checkPassword); //Run checkPassword function when user presses a key in confirmPassword
    document.getElementById("eyeSlashIcon").addEventListener("click", showPassword);
    document.getElementById("stuRadio").addEventListener("click", disableInput);
    document.getElementById("teaRadio").addEventListener("click", disableInput);
    document.getElementById("email").addEventListener("keyup", checkEmail); //Run checkEmail function when user presses a key in password

    let $userType = "unassigned";

    function checkPassword() {
        if (document.getElementById('password').value !== "" && document.getElementById('confirmPassword').value !== "") {
            if (document.getElementById('password').value === document.getElementById('confirmPassword').value) { //If password matches confirm password value, set background to green and add a tick

                document.getElementById('passwordValidityTxt').style.color = 'green';
                confirmPassword.style.backgroundColor = '#B3FFB4';
                document.getElementById('passwordValidityTxt').innerHTML = '✔';

            } else {

                document.getElementById('passwordValidityTxt').style.color = 'red'; //If password dos not match, set background to red and add a cross
                confirmPassword.style.backgroundColor = '#FFB3B3';
                document.getElementById('passwordValidityTxt').innerHTML = '✖';
            }
        }
    }


    function disableInput() {
        if (document.getElementById("stuRadio").checked === true) { 	//if student radio button is checked, disable lecture key field and enable course field
            document.getElementById("tooltipField").disabled = true;
            document.getElementById("courseInput").disabled = false;
            tooltipField.style.backgroundColor = '#A9A9A9'; //change disabled colour to a darker grey
            courseInput.style.backgroundColor = ''; //revert enabled field to default colour
            gradIcon.style.color = '';
            tooltipField.value = ""; //Remove lecture key value
            $userType = "student"; //set the userType variable to student
        } else if (document.getElementById("teaRadio").checked === true) { //if teacher radio button is checked, enable lecture key field and disable course field
            document.getElementById("tooltipField").disabled = false;
            document.getElementById("courseInput").disabled = true;
            courseInput.style.backgroundColor = '#A9A9A9'; //change disabled colour to a darker grey
            tooltipField.style.backgroundColor = ''; //revert enabled field to default colour
            gradIcon.style.color = '#A9A9A9'; //hide icon when selected
            courseInput.value = ""; //Remove course input value
            $userType = "teacher"; //sets the userType to teacher
        } else {
            //do nothing
        }
    }


    function showPassword(){
        var showPass = document.getElementById("password");
        var showConPass = document.getElementById("confirmPassword");
        var passwordStatus = document.getElementById('eyeSlashIcon')
        if (showPass.type === "password") { //If password has been entered, change to type text to make password visible
            showConPass.type ="text";
            showPass.type = "text";
            eyeSlashIcon.style.color = "red";
            passwordStatus.className ='fa fa-eye';
        } else { //If eye icon is pressed again, revert password type text back to password type to hide it.
            eyeSlashIcon.style.color = "#C0C0C0";
            passwordStatus.className ='fa fa-eye-slash';
            showConPass.type = "password";
            showPass.type = "password";
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function checkEmail(){

        //check for students
        if($userType === "student") {
            let $email = $('#email').val();
            if ($email.includes("@kent.ac.uk") ===true) {
                $.ajax({
                    url: '/reg/studentCheck',
                    type: 'POST',
                    data: $($email).serialize(),
                    dataType: "int",

                }).done(function($emailExists){

                    if($emailExists ===  0){
                        alert("does not exist");
                    }
                    else{

                        alert("does exist");
                    }

                });


            }
        }

        //check for teachers



    }


});