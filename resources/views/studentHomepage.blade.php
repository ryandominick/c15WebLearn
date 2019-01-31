<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Homepage</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/studentHome.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<hr>
<nav class="navigation">
    <a id="home" href="/student/home">Home</a>
    <a id="studProfile" href="/StudentProfile.html">My Profile</a>
    <a id="results" href="/myResults">My results</a>
    <a class="floatRight" href="/contact">Contact Us</a>
    <a class="floatRight" href="/student/logout">Logout</a>
</nav>
<hr>
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
<div id="popup" class="modal">

    <!-- Information inside popup -->
    <div class="popupContent">
        <span class="exit">&times;</span>
        <h2>Quiz Instructions</h2>
        <p>1: Ensure you have a stable connection and an enviroment with minimal distractions.</p>
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