<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Students</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script type="text/javascript" src="js/manageStudents.js"></script>
</head>
<body>

<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<nav class="navigation">
    <a id="leftNav" href="/teacher/home">Home</a>
    <a id="leftNav" href="/teacher/createquiz">Create Quizzes</a>
    <a id="rightNav" href="/teacher/logout">Logout</a>
</nav>
<br>
<div class="search">
    <input type="text" id="searchBox" placeholder="Search for student name...">
    <input type="submit" value="Search">
</div>

<h2 class="welcome"></h2>
<table>
    <caption class="tablecap">Your students</caption>

    <tr>
        <th>Student Name</th>
        <th>Degree Title</th>
        <th>Remove Student</th>
    </tr>

    <tr>
        <td>Cole Hart</td>
        <td>Computer Science</td>
        <td><button>Remove</button></td>
    </tr>

    <tr>
        <td>Harry Bennett</td>
        <td>Computer Science</td>
        <td><button>Remove</button></td>
    </tr>

    <tr>
        <td>Tim Grey</td>
        <td>Computer Science</td>
        <td><button id="popupButton">Remove</button></td>
    </tr>
</table>

<div id="removeStudentModal" class="modal">

    <!-- Information inside popup -->
    <div class="popupContent">
        <span class="exit">&times;</span>
        <p> Are you sure you want to remove this student?</p>
        <br>
        <div class="quizButton" align="center">
            <button id="takeQuiz">Remove Student</button>
        </div>
    </div>
</div>
</body>
</html>
