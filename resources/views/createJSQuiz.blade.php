<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/createJSQuiz.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/navBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<form method="post" action="/jsquiz" id="quizInfo">
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

    <div class = "questionContainer" id="questionSection">

        <div id ="QuestionContainer">
            <h3 class = "questionCaption">Javascript Question</h3>
            <br>
            <input type="text" class="inputQuestion" name="jsquestion" placeholder="Enter your question here"/>
            <br><br>
            <input type="text" class="inputAnswer" name="input" placeholder="Enter input here"/>
            <br><br>
            <input type="text" class="inputAnswer" name="output" placeholder="Enter expected output here"/>
            <br><br>
                <select name="type" class="inputAnswer" >
                    <option value="" disabled selected>Select a datatype for the expected output</option>
                    <option value="int">Int</option>
                    <option value="string">String</option>
                    <option value="array">Array</option>
                </select>
        </div>
    </div>
    <br>

</form>

<div class="buttonWrapper">
    <div class ="createQuizButtons">
        <button id="submitJSQuizButton" type="submit" value="Submit">Submit Quiz!</button>
    </div>
</div>

</body>
</html>