<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <script type="text/javascript" src="js/login.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="startContainer">
    <div class="bigLogo">
        <img src="/images/GradiQuiz_Logo.png" width="600px" height="180px" alt="logo"/>
    </div>
        <div class="loginContainer">
            <label class="userType">
                <input id="teaRadio" type="radio" value="student" name="userType"  required checked="checked">Student
                <span class="radioCheck"></span>
            </label>
            <label class ="userType">
                <input id="stuRadio"  type="radio" value="teacher" name="userType"  required >Teacher
                <span class="radioCheck"></span>
            </label>
            <form method="POST" action ="/student/login" id="loginForm" autocomplete="off">
                @csrf
            <br>
            <label for = "email">
                {{--<span class="fa fa-user-o"></span>--}}
                <input class="loginInputs" type ="email" placeholder = "Enter your University email address" size="35" name="email" required>
            </label>
            <br>
            <label for = "password">
                <input class="loginInputs" type ="password" id="passwordClicked" placeholder = "Please enter your password" name="password" size="35" required>
            </label>
            <br>
                <button class ="buttons" id="loginButton" type="submit" value="Submit"><span>Login </span><i class="fa fa-key"></i></button>
    </form>
            <br>
            <label for = "showPass" >Show Password
                <input type ="checkbox"name="checkbox" id="checkbox1">
                <br>
            </label>
        </div>
    <br>
    <p>Don't have an account? <a class="loginLinks" href="reg">Create one here!</a></p>
    <p> Forgot your password? <a class="loginLinks" href="/meme.html">Click here</a></p>
</div>
</body>
</html>