<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Results Page</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
    <div class="smallLogo">
        <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo" />
    </div>
    <hr>
        <nav class="navigation">
        <a id="leftNav" href="/student/home">Home</a>
        <a id="leftNav" href="StudentProfile.html">My Profile</a>
        <a id="rightNav" href="/student/logout">Logout</a>
        <a id="rightNav" href="/contact">Contact Us</a>
    </nav>
    <hr>
    <br>
    <div id="userBar">
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