<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/createQuiz.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
</div>
<nav class="navigation">
    <a id="leftNav" href="/teacher/home">Home</a>
    <a id="rightNav" href="/teacher/logout">Logout</a>
    <!--<a id="rightNav" href="/contact">Contact Us</a> DISABLE until fixed-->
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
               required/>
        <br>
        <label class="quizDetails">
            <h3>Quiz Title:</h3>
        </label>
        <input class="createQuizDetails" id="quizTitlePosition" type="text" placeholder="Please enter the quiz title (e.g. Database Systems)"
               name="quizTitle" size="50" required/>
        <br>
        <label class="quizDate">
            <h3>Start Date:</h3>
        </label>
        <input id="quizStartDatePosition" type="date" name="quizDateStart" required/> <br>
        <label class="quizDate">
            <h3 id="endDateCaption">End Date:</h3>
        </label>
        <input id="quizEndDatePosition" type="date" name="quizDateEnd" required/>
        <br>
        <label class="quizDetails">
            <h3>Timer (minutes):</h3>
        </label>
        <label class="createQuizDetails">
            <input id="quizTimerInput" type="number" placeholder="Duration of quiz" name="timer" required/>
            <span id='timerValidityTxt'></span>
        </label>
    </div>
    <div class = "questionContainer" id="questionSection">
    </div>
    {{--<button id="submitQuizButton" typ   e="submit" onclick="return submitAll()" value="Submit">Submit Quiz!</button>--}}
</form>
{{--
<form method="post" id="createQuizForm" action="/createquiz">--}}
{{--@csrf--}}
{{--
</form>
--}}
<button class="addQuestions" id="addMCQuestions">Add Multiple Choice Question</button>
<button class="addQuestions" id="addInputQuestions">Add Input Question</button>
<button id="submitQuizButton" type="submit" onclick="return submitAll()" value="Submit">Submit Quiz!</button>
</body>
</html>