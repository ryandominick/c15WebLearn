document.addEventListener("DOMContentLoaded", function () {



    document.getElementById("addMCQuestions").addEventListener("click", addMCQuestion); //Make add MC question function
    document.getElementById("addInputQuestions").addEventListener("click", addInputQuestion); //Make add input question function
    document.getElementById("addMCQuestions").addEventListener("click", showSubmitQuiz);
    document.getElementById("addInputQuestions").addEventListener("click", showSubmitQuiz);
    document.getElementById("quizTimerInput").addEventListener("keyup", timerLimit);
    document.getElementById("submitQuizButton").addEventListener("click", submitAll);


    var count = 1;
    var limit = 11; //11 is the limit of quizzes allowed

    function addMCQuestion() {
        if (count < limit) { //If count is less than the limit, add an MC question
            document.getElementById('createQuizForm').insertAdjacentHTML('beforebegin', '<br><br><br><div class = "QuestionContainer"><button id="deleteQuestion">Delete Question</button><h3 class = "questionCaption">Multiple Choice Question: ' + count + '</h3><br><input type="text" size = "200" class="mcQuestion" name="mcQuestion[]" placeholder="Enter your question here"/> <br><br> <input type="text" size = "100"  class="mcCorrectAnswer" name="mcCorrectAnswer[]" placeholder="Enter the correct answer"/><br><br> <input type="text" size = "100" class="mcIncorrectAnswer" name="mcIncorrectAnswer1[]" placeholder="Enter the incorrect answer here"/><br> <input type="text" size = "100" class="mcIncorrectAnswer" name="mcIncorrectAnswer2[]" placeholder="Enter the incorrect answer here"/><br><input type="text" size = "100"  class="mcIncorrectAnswer" name="mcIncorrectAnswer3[]" placeholder="Enter the incorrect answer here"/></div>'); //Add 4 inputs for the question, correct ans and incorrect ans on button click.
            count++;
        } else { //else, alert user the max has been reached
            alert("Question limit has been reached (10 max)");
        }
    }


    function addInputQuestion() {
        if (count < limit) { //If count is less than the limit, add an input question
            document.getElementById('createQuizForm').insertAdjacentHTML('beforebegin', '<br><br><br><div class = "QuestionContainer"><button id="deleteQuestion">Delete Question</button><h3 class = "questionCaption">Input Question: ' + count + '</h3><br><input type="text" size = "200" class="inputQuestion" name="inputQuestion[]" placeholder="Enter your question here"/> <br><br> <input type="text" size = "200" class="inputAnswer" name="inputAnswer[]" placeholder="Enter answer here"/><br><br></div>'); //Add two input fields for the input question on button click
            count++;
        } else {  //else, alert user the max has been reached
            alert("Question limit has been reached (10 max)");
        }
    }

    // document.getElementById("deleteQuestion").addEventListener("click", deleteQuestions);
    // function deleteQuestions() {
    //     // var element = document.getElementsByClassName("questionContainer");
    //     // element.classList.remove("questionContainer");
    //     // var elem = document.querySelector(".questionContainer");
    //     // elem.parentNode.removeChild(elem)
    //     // document.getElementById('questionContainer').parentNode.removeChild(document.getElementById('questionContainer'));
    //     // var item = document.getElementsById("QuestionContainer");
    //     // item.remove(item.selectedIndex);
    // }

    function showSubmitQuiz() {
        document.getElementById("submitQuizButton").style.display = "block";
    }

    function timerLimit() { //If timer is below 3 minutes or above 60 minutes, alert the user this is invalid
        var timeMax = 60;
        var timeMin = 3;
        var time = document.getElementById("quizTimerInput").value;

        if (time < timeMin || time > timeMax) {
            document.getElementById("timerValidityTxt").innerHTML = "Timer not valid (min:3) (max:60)"; //Display text if invalid
            document.getElementById("timerValidityTxt").style.color = "red";
            document.getElementById("timerValidityTxt").style.fontWeight = "bold";
        } else {
            document.getElementById("timerValidityTxt").innerHTML = "";
        }
    }


    function submitAll(){
        document.getElementById("quizInfo").submit();
        document.getElementById("createQuizForm").submit();
    }


});
