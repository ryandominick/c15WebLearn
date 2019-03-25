document.addEventListener("DOMContentLoaded", function () {
    var count = 1;
    document.getElementById("addMCQuestions").addEventListener("click", addMCQuestion); //Make add MC question function
    document.getElementById("addInputQuestions").addEventListener("click", addInputQuestion); //Make add input question function
    document.getElementById("addJavascriptQuestions").addEventListener("click", addJavascriptQuestion);
    document.getElementById("addMCQuestions").addEventListener("click", showSubmitQuiz);
    document.getElementById("addInputQuestions").addEventListener("click", showSubmitQuiz);
    document.getElementById("addJavascriptQuestions").addEventListener("click", showSubmitQuiz);
    document.getElementById("quizTimerInput").addEventListener("keyup", timerLimit);
    document.getElementById("submitQuizButton").addEventListener("click", submit);
    document.addEventListener("click", function(e){
        if(e.target && e.target.id === 'deleteQuestion'){
            e.preventDefault();
            $(e.target).closest("#QuestionContainer").remove();
            count--;
            $("#countCaption").each(function (count){
                $(this).text(count+1);
            })
        }
    });

    var count = 1;
    var limit = 11; //11 is the limit of quizzes allowed

    function addMCQuestion() {
        if (count < limit) { //If count is less than the limit, add an MC question

            document.getElementById('questionSection').insertAdjacentHTML
            ('beforeend', '' +
                '<div id = "QuestionContainer">' +
                '<button type="button" id="deleteQuestion">Delete<i class="fa fa-trash"></i></button>' +
                '<h3 class = "questionCaption">Multiple Choice Question: <span id="countCaption">' + count + '</span></h3>' +
                '<br>' +
                '<input type="text" size = "200" class="mcQuestion" name="mcQuestion[]" placeholder="Enter your question here" required/>' +
                ' <br><br> ' +
                '<input type="text" size = "100"  class="mcCorrectAnswer" name="mcCorrectAnswer[]" placeholder="Enter the correct answer" required/>' +
                '<br><br>' +
                ' <input type="text" size = "100" class="mcIncorrectAnswer" name="mcIncorrectAnswer1[]" placeholder="Enter the incorrect answer here" required/>' +
                '<br> ' +
                '<input type="text" size = "100" class="mcIncorrectAnswer" name="mcIncorrectAnswer2[]" placeholder="Enter the incorrect answer here" required/>' +
                '<br>' +
                '<input type="text" size = "100"  class="mcIncorrectAnswer" name="mcIncorrectAnswer3[]" placeholder="Enter the incorrect answer here" required/>' +
                '</div>'); //Add 4 inputs for the question, correct ans and incorrect ans on button click.
            count++;
        } else { //else, alert user the max has been reached
            alert("Question limit has been reached (10 max)");
        }
    }


    function addInputQuestion() {
        if (count < limit) { //If count is less than the limit, add an input question
            document.getElementById('questionSection').insertAdjacentHTML
            ('beforeend', '<div id ="QuestionContainer">' +
                '<button type="button" id="deleteQuestion">Delete<i class="fa fa-trash"></i></button>' +
                '<h3 class = "questionCaption">Input Question: <span id="countCaption">' + count + '</span></h3>' +
                '<br>' +
                '<input type="text" class="inputQuestion" name="inputQuestion[]" placeholder="Enter your question here" required/> ' +
                '<br><br> ' +
                '<input type="text" class="inputAnswer" name="inputAnswer[]" placeholder="Enter answer here" required/>' +
                '<br><br>' +
                '</div>'); //Add two input fields for the input question on button click
            count++;
        } else {  //else, alert user the max has been reached
            alert("Question limit has been reached (10 max)");
        }
    }

    function addJavascriptQuestion(){
        if (count < limit){
            document.getElementById('questionSection').insertAdjacentHTML
            ('beforeend', '<div id ="QuestionContainer">' +
                '<button type="button" id="deleteQuestion">Delete<i class="fa fa-trash"></i></button>' +
                '<h3 class = "questionCaption">Javascript Question: <span id="countCaption">' + count + '</span></h3>' +
                '<br>' +
                '<input type="text" class="inputQuestion" name="jsQuestion[]" placeholder="Enter your question here" required/> ' +
                '<br><br> ' +
                '<select class="inputQuestion" name="jsInputType1[]"/>' +
                '<option value = "null" disabled selected>Select a data type</option>' +
                '<option value = "string">String</option>' +
                '<option value = "number">Number</option>' +
                '<option value = "array">Array</option>' +
                '<option value = "boolean">Boolean</option>'+
                '</select>'+
                '<input type="text" class="inputQuestion" name="jsInput1[]" placeholder="input parameters eg: hello" required/>' +
                '<br><br>' +
                '<select class="inputQuestion" name="jsInputType2[]"/>' +
                '<option value = "null" disabled selected>Select a data type</option>' +
                '<option value = "string">String</option>' +
                '<option value = "number">Number</option>' +
                '<option value = "array">Array</option>' +
                '<option value = "boolean">Boolean</option>'+
                '</select>'+
                '<input type="text" class="inputQuestion" name="jsInput2[]" placeholder="optional input parameters eg: 3"/>' +
                '<br><br>' +
                '<select class="inputQuestion" name="jsInputType3[]"/>' +
                '<option value = "null" disabled selected>Select a data type</option>' +
                '<option value = "string">String</option>' +
                '<option value = "number">Number</option>' +
                '<option value = "array">Array</option>' +
                '<option value = "boolean">Boolean</option>'+
                '</select>'+
                '<input type="text" class="inputQuestion" name="jsInput3[]" placeholder="optional input parameters eg: [3,2,1]" />' +
                '<br><br>' +
                '<select class="inputQuestion" name="jsInputType4[]"/>' +
                '<option value = "null" disabled selected>Select a data type</option>' +
                '<option value = "string">String</option>' +
                '<option value = "number">Number</option>' +
                '<option value = "array">Array</option>' +
                '<option value = "boolean">Boolean</option>'+
                '</select>'+
                '<input type="text" class="inputQuestion" name="jsInput4[]" placeholder="optional input parameters eg: true"/>' +
                '<br><br>' +
                '<select class="inputQuestion" name="jsInputType5[]"/>' +
                '<option value = "null" disabled selected>Select a data type</option>' +
                '<option value = "string">String</option>' +
                '<option value = "number">Number</option>' +
                '<option value = "array">Array</option>' +
                '<option value = "boolean">Boolean</option>'+
                '</select>'+
                '<input type="text" class="inputQuestion" name="jsInput5[]" placeholder="optional input parameters"/>' +
                '<br><br>' +
                '<input type="text" class="inputQuestion" name="jsOutput[]" placeholder="Enter the expected output here" required/> ' +
                '<br><br> ' +
                '</div>'); //Add two input fields for the input question on button click
            count++;
        } else {  //else, alert user the max has been reached
            alert("Question limit has been reached (10 max)");
        }

    }

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

    function submit(){

        var inputTime = document.getElementById("quizTimerInput").value;
        document.getElementById("quizTimerInput").value = inputTime * 60;
    }


});