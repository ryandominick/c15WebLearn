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
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
</div>
<nav class="navigation">
    <a id="home" href="TeacherHomepage.html">Home</a>
    <a id="contact" href="contact.html">Contact Us</a>
    <a id="logout" href="/html/">Logout</a>
</nav>
<h2>Please enter the following information:</h2>
<br>
<form method="post" action="/createquiz" id="quizInfo">
    @csrf
    <div class="createContainer">


        <label class="quizDetails">
            <h3>Module Code:</h3>
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
            <span id='timerValidityTxt'> </span>
        </label>
    </div>
</form>
<form method="post" id="createQuizForm" action="/createQuiz">
    @csrf
</form>

<button class="addQuestions" id="addMCQuestions">Add Multiple Choice Question</button>
<button class="addQuestions" id="addInputQuestions">Add Input Question</button>

<button id="submitQuizButton" type="submit" onclick="return submitAll()" value="Submit">Submit Quiz!</button>

</body>

</html>