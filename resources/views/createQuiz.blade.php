<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/createQuiz.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/navBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
</div>

<div class="navigation" id="navBar">
    <a href="/teacher/home"> <i class="fas fa-home" id="homeIcon"></i>Home</a>

    <div class="profileDropdown">
        <button class="dropDownButton"><i class="fas fa-user" id="userIcon"></i> <?php echo Auth::user()->firstName?>
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinks">
            <a href="/teacher/profile">Profile</a>
            <a href="/teacher/manageStudents">Manage Students</a>
            <a href="/teacher/logout"> <i class="fas fa-sign-out-alt" id="signOutIcon"></i>Logout</a>
        </div>
    </div>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>

<br>
<br>
<form method="post" action="/createquiz" id="quizInfo">
    @csrf
    <div class="createContainer">
        <div id="centerQuizInfo">
        <div id ="registerIcons">
            <i class ="fa fa-code icon"></i>
        <input class="createQuizDetails" id="quizModulePosition" type="text" size="50" placeholder="Module Code"  name="moduleCode" required/>
        </div>

        <br>

        <div id ="registerIcons">
            <i class ="fa fa-pencil icon"></i>
        <input class="createQuizDetails" id="quizTitlePosition" type="text" size="35" placeholder="Quiz Title" name="quizTitle" required/>
        </div>

        <br>
            <div id ="registerIcons">
            <i id="calenPosition" class ="fa fa-calendar-check-o icon"></i>
        <input id="quizStartDatePosition" type="date" title="Start Date" name="quizDateStart" value="Start Date" required/> <br>
            </div>
            <br>
            <div id ="registerIcons">
            <i id="calenPosition" class ="fa fa-calendar-times-o icon"></i>
        <input id="quizEndDatePosition" type="date" title="End Date" name="quizDateEnd" required/>
            </div>

        <br>

        <div id ="registerIcons">
            <i class ="fa fa-clock-o icon"></i>
        <input id="quizTimerInput" type="number" placeholder="Quiz Duration (minutes)" name="timer" required/>
            <span id='timerValidityTxt'></span>
        </div>
        </div>
    </div>

    <br>

    <div class = "questionContainer" id="questionSection"></div>

    <br>

</form>

{{--
<form method="post" id="createQuizForm" action="/createquiz">--}}
{{--@csrf--}}
{{--
</form>
--}}

<div id="buttonWrapper">
<div id ="createQuizButtons">
<button class="addQuestions" id="addMCQuestions">Add Multiple Choice Question</button>
<button class="addQuestions" id="addInputQuestions">Add Input Question</button>
    <br>
    <br>
    <button id="submitQuizButton" type="submit" onclick="return submitAll()" value="Submit">Submit Quiz!</button>
</div>
</div>



</body>
</html>