<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GradiQuiz Registration</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script type="text/javascript" src="/js/registration.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="startContainer">
    <div class="bigLogo">
        <img src="/images/GradiQuiz_Logo.png" width="600px" height="180px" alt="logo"/>
    </div>
    <div class="loginContainer" id="registerContainer">
    <form method = "post" action="/reg">
        {{csrf_field()}}




        <label class="userType regRadioButtons">
            <input id="stuRadio" type="radio" onclick="disableInput()" value="student" name="userType" required />Student
            <span class="radioCheck"></span>
        </label>

        <label class="userType">
            <input  id="teaRadio" onclick="disableInput()" type="radio" value="teacher" name="userType" required />Lecturer
            <span class="radioCheck"></span>
        </label>
        <div id="faRadioButton" class="fa">&#xf128;
            <span class="tooltipText">Select the type of account you are registering.</span>
        </div>

        <br><br>
        <div id = "registerIcons">
            <i class ="fa fa-user icon"></i>
            <label for="email">
                <input type ="email" placeholder = "University Email Address" size="35" name="email" required >
            </label>
        </div>

        <div id ="registerIcons">
            <i id="passKeyIcon" class ="fa fa-key icon"></i>
        <label for="password">
            <input id="password" type ="password" placeholder = "Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="35"  required>
        </label>
        <div id = "eyeIconContainer">
            <i class="fa fa-eye-slash" id="eyeSlashIcon" aria-hidden="true" ></i>
            {{--<i class="fa fa-eye" id="eyeIcon"></i>--}}

        </div>
        <div id="faPassword" class="fa">&#xf128;
            <span class="tooltipText">Password Strength Requirements: <strong>minimum 8 characters, at least 1 capital letter, lowercase letter and number.</strong></span>
        </div>
        </div>
        <br>

        <div id ="registerIcons">
            <i id="conPassKeyIcon" class ="fa fa-key icon"></i>
        <label for="confirmPassword">
            <input id="confirmPassword" type ="password" placeholder = "Confirm Password" name="confirmPassword" size="35" onkeyup='checkPassword();' required>
            <div id = "passwordValidityTxtContainer">
            <span id='passwordValidityTxt'> </span>
            </div>
        </label>
        </div>

        <div id = "registerIcons">
            <i class="fa fa-drivers-license-o icon"></i>
        <label for="firstName">
            <input type ="text" placeholder = "First Name" name="firstName" size="35" required>
        </label>
        </div>

        <div id = "registerIcons">
            <i class="fa fa-drivers-license-o icon"></i>
        <label for="lastName">
            <input type ="text" placeholder = "Last Name" name="lastName" size="35" required>
        </label>
        </div>

        <div id = "registerIcons">
            <i class="fa fa-graduation-cap icon" id="gradIcon"></i>
        <label for="courseName">
            <input id="courseInput" type ="text" placeholder = "Course Title (e.g. Computer Science)" name="courseName" size="35" required>
        </label>
        </div>
        <br><br>

        <label for="lecturerKey">
            <input id="tooltipField" type ="number" placeholder = "Lecturer Key" name="teacherKey" size="35" required>
        </label>
        <div class="fa">&#xf128;
            <span class="tooltipText">Please refer to an email containing a key to create a teacher account.</span>
        </div>

        <br><br>
        <button class="buttons" id="loginButton"  type="submit" value="Submit" onclick="return formValidation()"><span>Create</span><i class="fa fa-user-plus"></i></button>
    </form>
    </div>
</div>
</body>
</html>