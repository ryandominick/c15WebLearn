document.addEventListener("DOMContentLoaded", function () {


    // The jquery ajax wrapper is set up with Laravels csrf protection to prevent failure
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#quizSubmit').click(function(){ajaxCall('/student/quiz/getparam', 'POST',$("#quizID").serialize(), "json", function(results) {

        if (results.parameter != null) {
            let i = 0;
            $('.jsQuestionContainer').each(function () {

                if($(this).find('#jsQuestion').val() != null) {
                    //  if ($(this).attr("id") === "string") {

                    //assign the code from the student's text input
                    code = $(this).find('#jsQuestion').val();
                    //code = $("#jsQuestion").val();
                    //retrieve parameters from ajax call relating to this question
                    let result = results.parameter[i];
                    //split the parameters by comma to convert to an array
                    let params = result.split(",+-+,");
                    //assign types to each parameter
                    let parameters = [];
                    for (j = 0; j < params.length; j++) {
                        if (params[j].includes("string")) {
                            let cutSParam = params[j].substring(6);
                            parameters.push(cutSParam);
                        }
                        else if (params[j].includes("number")) {
                            let cutNParam = params[j].substring(6);
                            let numberParam = Number(cutNParam);
                            parameters.push(numberParam);
                            //alert("num");
                        }
                        else if (params[j].includes("array")) {
                            let cutAParam = params[j].substring(5);
                            let tagRemove = cutAParam.slice(1, cutAParam.length - 1);
                            let separate = tagRemove.split(",");
                            parameters.push(separate);
                            //alert("array");
                        }
                        else if (params[j].includes("boolean")) {
                            let cutBParam = params[j].substring(7);
                            let boolParam = (cutBParam === "true");
                            parameters.push(boolParam);
                            //alert("bool");
                        }

                    }

                    let sum2 = new Function('x', code);
                    answer = sum2(parameters);

                    if (answer != null) {
                        $(this).find('#studentAnswer').val(answer);
                    }
                    i++;
                } else{
                    $(this).find('#studentAnswer').val("--incorrect--");
                }
            });


        }
        submit();

    })});
    function submit() {
        ajaxCall('/student/quiz/submit', 'POST', $("#takeQuizForm").serialize(), "json", function (results) {

            if (results.grade != null) {
                let cnt = '0';
                $('#grade').text("You scored: " + results.grade + "%");

                while (results.results[cnt] != null) {

                    if (results.results[cnt] == 1) {
                        $('#' + cnt).text("correct").addClass("correct");
                    } else {
                        $('#' + cnt).text("incorrect").addClass("incorrect");
                    }


                    // $('#'+ cnt).text((results.results[cnt]) == 1? ("correct",this.className= "correct"):("incorrect" , this.className= "incorrect"));
                    cnt++;
                }
            } else {
                alert(results.alert);
            }

        });
    }
    function ajaxCall(url, type, data, returnType, successFunc, failFunc) {

        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: returnType,

        }).done(successFunc).fail(failFunc);
    }

    function ajaxFail(){
        alert("An error occurred");
    }

});