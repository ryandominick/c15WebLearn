document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("quizTimerInput").addEventListener("keyup", timerLimit);
    document.getElementById("submitJSQuizButton").addEventListener("click", submitAll);

    function timerLimit() { //If timer is below 3 minutes or above 60 minutes, alert the user this is invalid
        var timeMax = 60;
        var timeMin = 3;
        var time = document.getElementById("quizTimerInput").value;

        if (time < timeMin || time > timeMax) {
            document.getElementById("timerValidityTxt").innerHTML = "Timer not valid (min:3) (max:60)"; //Display text if invalid
            document.getElementById("timerValidityTxt").style.color = "red";
            document.getElementById("timerValidityTxt").style.fontWeight = "bold";
        } else {
            document.getElementById("timerValidityTxt").innerHTML = "";
        }
    }


    function submitAll(){
        document.getElementById("quizInfo").submit();
    }

});