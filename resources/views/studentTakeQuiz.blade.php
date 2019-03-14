<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link rel="stylesheet" type="text/css" href="/css/projstyle.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/studentTakeQuiz.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="smallLogo">
    <img src="/images/GradiQuiz_Logo.png" style="height: 90px;" alt="logo"/>
</div>
<nav class="topnav">
    <a id="leftNav" href="/teacher/home">Home</a>
    <a id="leftNav" href="/student/results">My results</a>
    <a id="leftNav" href="StudentProfile.html">My Profile</a>
    <a id="rightNav" href="/contact">Contact Us</a>
    <a id="rightNav" href="/html/">Log out</a>
</nav>

<h2 id="quizHeader">{{$quizTitle}}</h2>



<form id ="takeQuizForm">

    <input type="hidden" name="quizID" value="{{$quizID}}">

    <?php $i = 0;
          $q = 0;?>

    @foreach($mQuestions as $mQuestion)


        <br>
        <br>

        <div class = "takeQuestionContainer">
            <br>
                 <fieldset class="radiogroup">

                     <legend>{{$mQuestion[0]}}</legend>
                <label ><input type="radio" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[2]}}" }' >{{$mQuestion[2]}}</label> <br>
                <label ><input type="radio" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[3]}}" }' >{{$mQuestion[3]}}</label> <br>
                <label ><input type="radio" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[4]}}" }' >{{$mQuestion[4]}}</label> <br>
                <label ><input type="radio" name={{$i}} class="mcOption" value='{ "mcID" : "{{$mQuestion[1]}}" ,"text" : "{{$mQuestion[5]}}" }' >{{$mQuestion[5]}}</label> <br>

                 </fieldset>
            <span id={{$q}}></span>
        </div>

        <?php $i++;
              $q++;?>

    @endforeach

        @foreach( $iQuestions as $iQuestion)

            <br>
            <br>

            <div class = "takeQuestionContainer">

                <p class="questionText">{{$iQuestion->inputQuestion}}</p>
                <input type="hidden" name={{$i}} class="inputQuestionIDs" value={{$iQuestion->inputQuestionID}}>

                <?php $i++ ?>

                <input type="text" class="inputQuestion" name={{$i}}><br>  <span id={{$q}}></span> </div>

            <?php $i++;
                  $q++;?>

        @endforeach

        <br>
        <br>

        <div class="QuizStyle">
            <input type="button" id="quizSubmit" value="Submit Quiz Now">
        </div>

    <br>
</form>

<span id="grade"></span>

</body>
</html>
