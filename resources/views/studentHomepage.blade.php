<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Homepage</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/studentHome.js"></script>
    <script type="text/javascript" src="/js/navBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<div class="navigation" id="navBar">
    <a href="/student/home"> <i class="fas fa-home" id="homeIcon"></i>Home</a>

    <div class="profileDropdown">
        <button class="dropDownButton"><i class="fas fa-user-graduate" id="userIcon"></i><?php echo Auth::user()->firstName?>
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinks">
            <a href="/student/profile"><i class="fas fa-user-graduate" id="userIcon"></i>Profile</a>
            <a href="/student/results"><i class="fas fa-poll" id="userIcon"></i>Results</a>
            <a href="/student/logout"> <i class="fas fa-sign-out-alt" id="signOutIcon"></i>Logout</a>
        </div>
    </div>
    <a href="/contact"> <i class="fas fa-envelope" id="envelopeIcon"></i>Contact Us</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>
<br>
<h2 class="welcome"></h2>
<table>
    <caption class="tablecap">My Deadlines</caption>
    <tr>
        <th>Module Code</th>
        <th>Quiz Title</th>
        <th id="duedate">Due Date</th>
    </tr>
    <td>CO530</td>
    <td>Introduction to Web Development <!-- Open popup -->
        <button id="popupButton">Take Quiz</button></td>
    <td>25/12/18</td>

    <tr>
        <td>CO342</td>
        <td>Introduction to Java</td>
        <td>30/11/18</td>
    </tr>

    <tr>
        <td>CO705</td>
        <td>Database Systems</td>
        <td>12/12/18</td>
    </tr>

    <tr>
        <td>CO364</td>
        <td>Human Computer Interaction</td>
        <td>15/12/18</td>
    </tr>
</table>

<!-- Modal -->
<div id="popup" class="mainModal">

    <!-- Information inside popup -->
    <div class="popupInformation">
        <span class="exit">&times;</span>
        <h2 id="center">Quiz Instructions</h2>
        <p>1: Ensure you have a stable connection and an environment with minimal distractions.</p>
        <br>
        <p>2: Please do not use the internet or other resources to help you with this quiz.</p>
        <br>
        <p>3: You have limited time, any questions left unanswered will result as incorrect. The quiz will auto submit when time reaches the limit.</p>
        <br>
        <p>4: If the page is closed at any time during the quiz, all unanswered questions will be marked as incorrect.</p>
        <br>
        <p>5: When you have finished the quiz and are happy with your answers, ensure that you have answered all questions. Click the 'submit' button when you are ready to finish.</p>
        <br>
        <p>6: When you are ready, click the 'Start Quiz' button to begin and start the timer.</p>
        <br>
        <div class="quizButton" align="center">
            <button id="takeQuiz">Start Quiz</button>
        </div>
    </div>
</div>
</body>
</html>