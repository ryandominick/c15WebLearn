<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Homepage</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/studentHome.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<hr>
<nav class="navigation">
    <a id="home" href="/student/home">Home</a>
    <a id="studProfile" href="/StudentProfile.html">My Profile</a>
    <a id="results" href="MyResults.html">My results</a>
    <a class="floatRight" href="/contact">Contact Us</a>
    <a class="floatRight" href="/student/logout">Logout</a>
</nav>
<hr>
<br>
<h1>Welcome, </h1>
<h2 class="welcome"></h2>
<table>
    <tr>
        <td>FirstName</td>
        <td>LastName</td>
        <td>Email</td>
    </tr>
    @foreach($data as $value)
    <tr>
        <td>{{ $value->firstName }}</td>
        <td>{{ $value->lastName }}</td>
        <td>{{ $value->email }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>