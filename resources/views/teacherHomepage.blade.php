<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TeacherHomepage</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script type="text/javascript" src="/js/navBar.js"></script>

</head>
<body>
@if (session()->has('created'))
    <script> $(document).ready(function(){alert("Quiz successfully created");}); </script>
@endif
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>

<div class="navigation" id="navBar">
    <a href="/teacher/home"> <i class="fas fa-home" id="homeIcon"></i>Home</a>

    <div class="profileDropdown">
        <button class="dropDownButton"><i class="fas fa-user-tie" id="userIcon"></i> <?php echo Auth::user()->firstName?>
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinksTeacher">
            <a href="/teacher/profile"><i class="fas fa-user-tie" id="userIcon"></i>Profile</a>
            <a href="/teacher/manageStudents"><i class="fas fa-user-graduate" id="userIcon"></i>Manage Students</a>
            <a href="/teacher/logout"> <i class="fas fa-sign-out-alt" id="userIcon"></i>Logout</a>
        </div>
    </div>
    <a href="/teacher/search"><i class="fas fa-search" id="userIcon"></i>Search</a>
    <a href="/teacher/createquiz"> <i class="fas fa-edit" id="userIcon"></i> Create a quiz</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>

<!--<a id="rightNav" href="/contact">Contact Us</a> DISABLE until fixed-->
<br>
<h2 class="welcome"></h2>
<table>
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
