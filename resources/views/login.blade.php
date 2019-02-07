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
            <div id="registerIcons">
                <i class ="fa fa-user icon"></i>
                <label for="email">
                    <input type ="email" placeholder = "University Email Address" size="25" name="email" required >
                </label>
            </div>
            <div id="registerIcons">
                <i id="passKeyIcon" class ="fa fa-lock icon"></i>
                <label for = "password">
                    <input class="loginInputs" type ="password" id="passwordClicked" placeholder = "Please enter your password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="25" required>
                </label>
            </div>
            <button class ="buttons" id="loginButton" type="submit" value="Submit"><span>Login </span><i class="fa fa-key"></i></button>
        </form>
        <br>
        <label for ="showPass" >Show Password
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