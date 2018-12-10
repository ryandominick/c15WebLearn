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
    <div class="logo">
        <img src="/images/GradiQuiz_Logo.png" alt="logo" />
    </div>

    <form method = "post" action="/reg">
        {{csrf_field()}}



        <label id="studentRadioRegistration">
            <input id="stuRadio" type="radio" onclick="disableInput()" value="student" name="userType" required />Student
        </label>

        <label id="teacherRadioRegistration">
            <input id="teaRadio" onclick="disableInput()" type="radio" value="teacher" name="userType" required />Lecturer
        </label>
        <div id="faRadioButton" class="fa">&#xf128;
            <span class="tooltipText">Select the type of account you are registering.</span>
        </div>

        <br><br>
        <label for="email">
            <input type ="email" placeholder = "University Email Address" size="35" name="email" required >
        </label>
        <br>

        <label for="password">
            <input id="password" type ="password" placeholder = "Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" size="35"  required>
        </label>
        <div id = "eyeIconContainer">
            <i class="fa fa-eye" id="eyeIcon"></i>
        </div>
        <div id="faPassword" class="fa">&#xf128;
            <span class="tooltipText">Password Strength Requirements: <strong>minimum 8 characters, at least 1 capital letter, lowercase letter and number.</strong></span>
        </div>
        <br>

        <label for="confirmPassword">
            <input id="confirmPassword" type ="password" placeholder = "Confirm Password" name="confirmPassword" size="35" onkeyup='checkPassword();' required>
            <span id='passwordValidityTxt'> </span>
        </label>
        <br>

        <label for="firstName">
            <input type ="text" placeholder = "First Name" name="firstName" size="35" required>
        </label>
        <br>

        <label for="lastName">
            <input type ="text" placeholder = "Last Name" name="lastName" size="35" required>
        </label>
        <br>

        <label for="courseName">
            <input id="courseInput" type ="text" placeholder = "Course Title (e.g. Computer Science)" name="courseName" size="35" required>
        </label>
        <br><br>

        <label for="lecturerKey">
            <input id="tooltipField" type ="number" placeholder = "Lecturer Key" name="teacherKey" size="35" required>
        </label>
        <div class="fa">&#xf128;
            <span class="tooltipText">Please refer to an email containing a key to create a teacher account.</span>
        </div>

        <br><br>
        <button id="registerSubmit" type="submit" value="Submit" onclick="return formValidation()">Register me!</button>

    </form>
</div>
</body>
</html>