document.addEventListener("DOMContentLoaded", function () {

    window.addEventListener("load", takeMCQuestion);

    var mcCount = 2;
    // var inputCount = 1;
    var i;
    var count =1;

    function takeMCQuestion(){
        for (i=0; i<mcCount; i++) {
            document.getElementById('takeQuizForm').insertAdjacentHTML('beforebegin', '<br><br><br><div class = "mcQuestionContainer"><h3 class = "mcQuestionTitle">Multiple Choice Question: ' +count+ '</h3><br><h3 class ="mcQuestionTitle" name = "mcQuestion"' + count + '>Question Example</h3><br><input type="radio" class="mcOption" value="mc1" name="mcOption1' + count + '/><br><br><input type="radio" class="mcOption" value="mc1" name="mcOption1' + count + '/><input type="radio" class="mcOption" value="mc1" name="mcOption1' + count + '/><input type="radio" class="mcOption" value="mc1" name="mcOption1' + count + '/></div>');
            count++;
        }
    }
});
