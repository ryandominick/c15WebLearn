<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TeacherHomepage</title>
    <link rel="stylesheet" type="text/css" href="css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

<div class="smallLogo">
    <img src="GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<hr>
<nav class="navigation">
    <a id="home" href="teacherHomepage.blade.php">Home</a>
    <a id="create" href="/html/">Create Quizzes</a>
    <a id="logout" href="/logout">Log out</a>
    <a id="contact" href="contact.html">Contact Us</a>
</nav>
<hr>
<br>
<h2 class="welcome"> Welcome Back, {{$firstname}} </h2>
<table style="width:100%">
    <caption class="tablecap">Current Quizzes</caption>

    <tr>
        <th>Module Code</th>
        <th>Quiz Title</th>
        <th>Submissions</th>
    </tr>

    <tr>
        <td>CO530</td>
        <td>Introduction to Web Development</td>
        <td>45</td>
    </tr>

    <tr>
        <td>CO342</td>
        <td>Introduction to Java</td>
        <td>7</td>
    </tr>

    <tr>
        <td>CO705</td>
        <td>Database Systems</td>
        <td>40</td>
    </tr>

    <tr>
        <td>CO364</td>
        <td>Human Computer Interaction</td>
        <td>25</td>
    </tr>
</table>
</body>
</html>
