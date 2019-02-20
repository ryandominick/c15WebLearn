<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Students</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/js/navBar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script type="text/javascript" src="/js/manageStudents.js"></script>
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
            <a href="/teacher/logout"> <i class="fas fa-sign-out-alt" id="signOutIcon"></i>Logout</a>
        </div>
    </div>
    <a href="/teacher/createquiz"> <i class="fas fa-edit" id="editIcon"></i> Create a quiz</a>
    <a href="javascript:void(0);" class="burger" onclick="burgerNav()">&#9776;</a>
</div>
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
        <td><button class="removeStudentButton">Remove</button></td>
    </tr>

    <tr>
        <td>Harry Bennett</td>
        <td>Computer Science</td>
        <td><button class="removeStudentButton">Remove</button></td>
    </tr>

    <tr>
        <td>Tim Grey</td>
        <td>Computer Science</td>
        <td><button class="removeStudentButton">Remove</button></td>
    </tr>
</table>
<!-- modal container -->
<div id="popup" class="modal">

    <!-- modal content -->
    <div class="popupContent">
        <div class ="modal-top">
        <span class="exit">&times;</span>
            <h2>Remove Student</h2>
        </div>
        <div class="modal-body">
        <h3 id="removeStudentPopup">Are you sure you want to remove this student?</h3>
        <button type="button" id="deleteStudentConfirm">Delete<i id="studentTrash" class="fa fa-trash"></i></button>
        </div>
    </div>
</div>
</body>
</html>
