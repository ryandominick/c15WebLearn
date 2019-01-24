<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/takeQuiz.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<nav class="navigation">
    <a id="home" href="/teacher/home">Home</a>
    <a id="results" href="MyResults.html">My results</a>
    <a id="studProfile" href="StudentProfile.html">My Profile</a>
    <a id="contact" href="contact.html">Contact Us</a>
    <a id="logout" href="/html/">Log out</a>
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
