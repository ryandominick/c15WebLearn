<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Results Page</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/navBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
</div>
<div class="navigation" id="navBar">
    <a href="/student/home"> <i class="fas fa-home" id="homeIcon"></i>Home</a>

    <div class="profileDropdown">
        <button class="dropDownButton"><i class="fas fa-user" id="userIcon"></i><?php echo Auth::user()->firstName?>
            <i class="fa fa-caret-down" id="dropdwn"></i>
        </button>
        <div class="dropdownLinks">
            <a href="/student/profile">Profile</a>
            <a href="/student/profile/settings">Account Information</a>
            <a href="/student/logout"> <i class="fas fa-sign-out-alt" id="signOutIcon"></i>Logout</a>
        </div>
    </div>
    <a href="/contact"> <i class="fas fa-envelope" id="envelopeIcon"></i>Contact Us</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>
<br>
<div id="center">
    <label for="searchInput"><input type="search" id="searchText" name="searchInput"></label>
    <input type="button" id="searchButton" class="buttons" value="search">
</div>
<table>
    <caption class="tablecap">Results</caption>
    <tr>
        <th>Module Code</th>
        <th>Module Name</th>
        <th>Quiz Title</th>
        <th>Grade</th>

    </tr>
    <td>CO530</td>
    <td>Introduction to Web Development</td>
    <td>Week 1 assessment</td>
    <td>62%</td>


    <tr>
        <td>CO213</td>
        <td>Theory of Computing</td>
        <td>week 2 assessment</td>
        <td>55%</td>
    </tr>

</table>
</body>
</html>