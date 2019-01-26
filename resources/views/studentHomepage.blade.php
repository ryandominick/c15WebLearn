<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Homepage</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<hr>
<nav class="navigation">
    <a id="home" href="/studentHome">Home</a>
    <a id="studProfile" href="StudentSearch">My Profile</a>
    <a id="studentSearch" href="/student/search">Search Quizzes</a>
    <a id="contact" href="contact.html">Contact Us</a>
    <a id="logout" href="/student/logout">Logout</a>

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
    <td>Introduction to Web Development</td>
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
</body>
</html>