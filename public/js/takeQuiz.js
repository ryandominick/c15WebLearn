document.addEventListener("DOMContentLoaded", function () {

    window.addEventListener("load", takeMCQuestion);
    window.addEventListener("load", takeInputQuestion);

    var mcCount = 3;
    var inputCount = 1;
    var i;
    var count =1;
    var questionList =  "";
    var inputQuestionList = "";

    function takeMCQuestion(){
    for (i=0; i<mcCount; i++) {
        questionList += '<br><br><br><div class = "takeQuestionContainer"><h3 class = "questionTypeTitle">Question ' +count+ '</h3><br><h3 class ="questionTitle" name="mcQuestion"' + count + '>Question Example</h3><br><div class ="answerContainer"><input type="radio" class="mcOption" value="mc1" name="mcOption1' + count + '"/> <br> <input type="radio" class="mcOption" value="mc2" name="mcOption2' + count + '"/> <br> <input type="radio" class="mcOption" value="mc3" name="mcOption3' + count + '"/><br><input type="radio" class="mcOption" value="mc4" name="mcOption4' + count + '"/><br></div></div>';
        count++;
        }
        document.getElementById('takeQuizForm').insertAdjacentHTML('beforebegin', questionList);
    }

    function takeInputQuestion(){
        for (i=0; i<inputCount; i++) {
            inputQuestionList += '<br><br><br><div class = "takeQuestionContainer"><h3 class = "questionTypeTitle">Question ' +count+ '</h3><br><h3 class ="questionTitle" name="inputQuestion"' + count + '>Question Example</h3><br><div class ="answerContainer"><input type="text" size ="200" class="answer" placeholder="Enter Answer Here" name="inputAnswer' + count + '"/></div></div>';
            count++;
        }
        document.getElementById('takeQuizForm').insertAdjacentHTML('beforebegin', inputQuestionList);
    }
});
