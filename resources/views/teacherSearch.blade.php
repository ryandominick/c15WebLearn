<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <title>Results Page</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/teacherSearch.js"></script>


</head>

<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
</div>
<nav class="topnav">
    <a id="leftNav" href="/student/home">Home</a>
    <a id="leftNav" href="StudentProfile.html">My Profile</a>
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

    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<table id="pageTable">
    <tbody>
    <tr></tr>
    </tbody>
</table>
</body>
</html>