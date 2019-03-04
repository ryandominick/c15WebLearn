<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/studentTakeQuiz.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<nav class="topnav">
    <a id="leftNav" href="/teacher/home">Home</a>
    <a id="leftNav" href="/student/results">My results</a>
    <a id="leftNav" href="StudentProfile.html">My Profile</a>
    <a id="rightNav" href="/contact">Contact Us</a>
    <a id="rightNav" href="/html/">Log out</a>
</nav>
<h2 id="quizHeader">Quiz</h2>

<form id ="takeQuizForm" action="submit.php">
</form>



<div class="QuizStyle">
    <h2>If you are happy with your answers, submit now</h2>
    <input type="submit" id="quizSubmit" value="Submit Quiz Now">
</div>
</body>
</html>
