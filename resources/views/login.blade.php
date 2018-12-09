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

    <form method="POST" action = "/authenticate">
        @csrf
        <div class="loginContainer">
            <label for = "email">
                <input type ="email" placeholder = "Enter your University email address" size="35" name="email" required>
            </label>
            <br>
            <label for = "password">
                <input type ="password" id="passwordClicked" placeholder = "Please enter your password" name="password" size="35" required>
            </label>
            <br>
            <label for = "showPass" onclick="showHidePass()">Show Password
                <input type ="checkbox">
                <br>
                <button id="loginButton" type="submit" value="Submit">Log me in!</button>
            </label>
        </div>
    </form>
<br><br>
<a id="registerLink" href="Registration.html">Don't have an account? Click here</a><br>
<a id="forgotPassword" href="/meme.html">Forgot your password? Click here</a>
</div>
</body>
</html>
