document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("stuRadio").addEventListener("click", disableInput); //Make student radio buttons function after selection
    document.getElementById("teaRadio").addEventListener("click", disableInput); //Make teacher radio buttons function after selection
    document.getElementById("password").addEventListener("keyup", checkPassword); //Run checkPassword function when user presses a key in password
    document.getElementById("confirmPassword").addEventListener("keyup", checkPassword); //Run checkPassword function when user presses a key in confirmPassword
    document.getElementById("eyeIcon").addEventListener("click", showPassword);

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

    document.getElementById("stuRadio").addEventListener("click", disableInput);
    document.getElementById("teaRadio").addEventListener("click", disableInput);
    function disableInput() {
        if (document.getElementById("stuRadio").checked === true) { 	//if student radio button is checked, disable lecture key field and enable course field
            document.getElementById("tooltipField").disabled = true;
            document.getElementById("courseInput").disabled = false;
            tooltipField.style.backgroundColor = '#A9A9A9'; //change disabled colour to a darker grey
            courseInput.style.backgroundColor = ''; //revert enabled field to default colour
            tooltipField.value = ""; //Remove lecture key value
        } else if (document.getElementById("teaRadio").checked === true) { //if teacher radio button is checked, enable lecture key field and disable course field
            document.getElementById("tooltipField").disabled = false;
            document.getElementById("courseInput").disabled = true;
            courseInput.style.backgroundColor = '#A9A9A9'; //change disabled colour to a darker grey
            tooltipField.style.backgroundColor = ''; //revert enabled field to default colour
            courseInput.value = ""; //Remove course input value
        } else {
            //do nothing
        }
    }

    function showPassword(){
        var showPass = document.getElementById("password");
        var showConPass = document.getElementById("confirmPassword");
        if (showPass.type === "password") { //If password has been entered, change to type text to make password visible
            showConPass.type ="text";
            showPass.type = "text";
            eyeIcon.style.color = "red";
        } else { //If eye icon is pressed again, revert password type text back to password type to hide it.
            eyeIcon.style.color = "#C0C0C0";
            showConPass.type = "password";
            showPass.type = "password";
        }
    }

});