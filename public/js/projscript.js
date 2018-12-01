function checkPassword() {
    if(document.getElementById('password').value !== "" && document.getElementById('confirmPassword').value !== "") {
        if (document.getElementById('password').value === document.getElementById('confirmPassword').value) {

            document.getElementById('passwordValidityTxt').style.color = 'green';
            confirmPassword.style.backgroundColor = '#B3FFB4';
            document.getElementById('passwordValidityTxt').innerHTML = '✔';

        } else {

            document.getElementById('passwordValidityTxt').style.color = 'red';
            confirmPassword.style.backgroundColor = '#FFB3B3';
            document.getElementById('passwordValidityTxt').innerHTML = '✖';
        }
    }
}

passwordInput.onfocus = function() {
    document.getElementByID('passwordValidityTxt').style.display = 'block';
}

conPasswordInput.onblur = function() {
    document.getElementByID('passwordValidityTxt').style.display = 'none';
}

function disableInput(){
    if (document.getElementById("stuRadio").checked === true){ 	//if student radio button is checked, disable lecture key field and enable course field
        document.getElementById("tooltipField").disabled = true;
        document.getElementById("courseInput").disabled = false;
        tooltipField.style.backgroundColor = '#A9A9A9'; //change disabled colour to a darker grey
        courseInput.style.backgroundColor = ''; //revert enabled field to default colour
    } else if (document.getElementById("teaRadio").checked === true){ //if teacher radio button is checked, enable lecture key field and disable course field
        document.getElementById("tooltipField").disabled = false;
        document.getElementById("courseInput").disabled = true;
        courseInput.style.backgroundColor = '#A9A9A9';
        tooltipField.style.backgroundColor = '';
    } else {
        //do nothing
    }
}
