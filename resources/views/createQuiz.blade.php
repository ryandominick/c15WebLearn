<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/createQuiz.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>

<body>

<script>
    // var timeMax = 15;
    // var timeMin = 3;
    // timerHelp;
    // function timerLimit(){
    // var time = document.getElementById("quizTimerPosition").value;


    //     if (time < timeMin || time > timeMax){
    //         timerHelp = "Timer not valid (min:3) (max:15)";
    //     } else {
    //         //do nothing
    //     }
    //     document.getElementById("timerValidityTxt").innerHTML = timerHelp;
    // }
</script>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.jpg" style="height: 90px;" alt="logo" />
</div>
<nav class="navigation">
    <a id="home" href="TeacherHomepage.html">Home</a>
    <a id="contact" href="contact.html">Contact Us</a>
    <a id="logout" href="/html/">Logout</a>
</nav>
<h2>Please enter the following information:</h2>
<br>
<form method="post" action="/createquiz">
    <div class="createContainer">


        <label class="quizDetails">
            Module Code:
        </label>
        <input class="createQuizDetails" id="quizModulePosition" type="text" placeholder="(e.g. CO434)" size="10" name="moduleCode"
               required />
        <br>
        <label class="quizDetails">
            <h3>Quiz Title:</h3>
        </label>
        <input class="createQuizDetails" id="quizTitlePosition" type="text" placeholder="Please enter the quiz title (e.g. Database Systems)"
               name="quizTitle" size="50" required />

        <br>
        <label class="quizDate">
            <h3>Start Date:</h3>
        </label>
        <input id="quizStartDatePosition" type="date" name="quizDateStart" required />

        <label class="quizDate">
            <h3 id="endDateCaption">End Date:</h3>
        </label>
        <input id="quizEndDatePosition" type="date" name="quizDateEnd" required />
        <br>
        <label class="quizDetails">
            <h3>Timer (minutes):</h3>
        </label>

        <label class="createQuizDetails">
            <input id="quizTimerInput" type="number" placeholder="Please enter duration" name="timer" required />
            <p id='timerValidityTxt'> </p>
        </label>

    </div>


</form>
<form method="post" id="createQuizForm" action="/createQuiz">

</form>

<button class="addQuestions" id="addMCQuestions">Add Multiple Choice Question</button>
<button class="addQuestions" id="addInputQuestions">Add Input Question</button>

<button id="submitQuizButton" type="submit" onsubmit="" value="Submit">Submit Quiz!</button>

</body>

</html>