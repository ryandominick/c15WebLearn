<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="/js/login.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

<div class="startContainer">
    <div class="bigLogo">
        <img src="/images/GradiQuiz_Logo.png" width="600px" height="180px" alt="logo"/>
    </div>



        <div class="loginContainer">
            <label id="studentRadioLogin">
                <input id="stuRadio" type="radio" value="student" name="userType" required />Student
            </label>

            <label for ="teacherRadioLogin">
                <input id="teaRadio"  type="radio" value="teacher" name="userType" required />Teacher
            </label>
            <form method="POST" action ="/student/login">
                @csrf
            <br>
            <label for = "email">
                <input type ="email" placeholder = "Enter your University email address" size="35" name="email" required>
            </label>
            <br>
            <label for = "password">
                <input type ="password" id="passwordClicked" placeholder = "Please enter your password" name="password" size="35" required>
            </label>
            <br>
                <button id="loginButton" type="submit" value="Submit">Log me in!</button>
    </form>
            <label for = "showPass" onclick="showHidePass()">Show Password
                <input type ="checkbox">
                <br>
            </label>
        </div>


    <br><br>
    <a id="registerLink" href="Registration.html">Don't have an account? Click here</a><br>
    <a id="forgotPassword" href="/meme.html">Forgot your password? Click here</a>
</div>
</body>
</html>