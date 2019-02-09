<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
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
    <a href="/student/home"> <i class="fa fa-home" id="homeIcon"></i>Home</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">
        <i class="fa fa-bars" id="burgerIcon"></i></a>

    <div class="profileDropdown">
        <button class="dropDownButton">Your Profile
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinks">
            <a href="/student/profile">Profile</a>
            <a href="/student/results">Results</a>
            <a href="/student/logout">Logout</a>
        </div>
    </div>
</div>

<h2 id="center">Contact Us</h2>

<!--CREATE GET IN TOUCH FORM, will look professional-(Cole) -->
<p id="techInfo">For technical support, bug reports and recommendations, please contact us here: <br>
    <a href="mailto:GradiQuiz@gmail.com">GradiQuiz@gmail.com</a>
</p>
</body>
</html>