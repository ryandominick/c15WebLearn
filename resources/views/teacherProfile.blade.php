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
<div id="accountInfo">
    <h1>Account Details</h1>
    <!--Get current logged in user's firstName-->
    Firstname: <input type="text" name="foo" id="firstname" value="<?php echo Auth::user()->firstName?>" disabled><br>
    <!--Get current logged in user's lastName-->
    Surname: <input type="text" name="foo" id="surname" value="<?php echo Auth::user()->lastName?>" disabled><br>
    <!--Get current logged in user's email address-->
    Email Address: <input type="text" size="35" id="emailProfile" name="foo" value="<?php echo Auth::user()->email?>" disabled><br>
</div>
</body>
</html>
