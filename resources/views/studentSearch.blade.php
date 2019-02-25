<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <title>Results Page</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Validate the ajax library for security -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/studentSearch.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
</div>
<nav class="topnav">
    <a id="leftNav" href="/student/home">Home</a>
    <a id="leftNav" href="StudentProfile.html">My Profile</a>
    <a id="leftNav" href="/student/results">My results</a>
    <a id="rightNav" href="/contact">Contact Us</a>
    <a id="rightNav" href="/student/logout">Logout</a>
</nav>
<br>
<div id="userBar">

    <form id="searchQuery">
        <label for="searchInput"><input type="search" id="searchText" name="searchInput"></label>
        <input type="button" id="searchButton" class="buttons" value="search">
    </form>

</div>

<table id="quizResults">
    <caption class="tablecap">Quizzes</caption>
    <thead>
    <tr>
        <th>Title</th>
        <th>Module Code</th>
        <th>Module Name</th>
        <th>Deadline</th>
        <th>Result</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="noResults">No matches were found</div>

<table id="pageTable">
    <tbody>
    <tr></tr>
    </tbody>
</table>

<!-- Modal -->
<div id="popup" class="mainModal">
    <!-- Information inside popup -->
    <div class="popupInformation">
        <span class="exit">&times;</span>
        <h2 id="center">Quiz Instructions</h2>
        <p>1: Ensure you have a stable connection and an environment with minimal distractions.</p>
        <br>
        <p>2: You have limited time, any questions left unanswered will result as incorrect. The quiz will auto submit when time reaches the limit.</p>
        <br>
        <p>3: If the page is closed at any time during the quiz, all unanswered questions will be marked as incorrect.</p>
        <br>
        <p>4: When you have finished the quiz and are happy with your answers, ensure that you have answered all questions. Click the 'submit' button when you are ready to finish.</p>
        <br>
        <p>5: When you are ready, click the 'Start Quiz' button to begin and start the timer, you will have <span id="time"></span> minutes.</p>
        <br>
        <input type="hidden" id="quizID">
        <div class="quizButton" align="center">
            <button id="takeQuiz">Start Quiz</button>
        </div>
    </div>
</div>

</body>

</html>