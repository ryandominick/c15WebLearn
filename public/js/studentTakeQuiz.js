document.addEventListener("DOMContentLoaded", function () {


    // The jquery ajax wrapper is set up with Laravels csrf protection to prevent failure
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#quizSubmit').click(function(){ajaxCall('/student/quiz/getparam', 'POST',$("#quizID").serialize(), "json", function(results){

        if(results.parameter != null){
        let i = 0;
            $('.jsQuestionContainer').each(function() {


                  //  if ($(this).attr("id") === "string") {

                        code = $("#codeArea").val();
                        let result = results.parameter[i];
                        let params = result.split(",");

                        var func = new Function('params'){}

                        if(params[1] !== undefined){
                            let x = params[0];
                            let y = params[1];
                            var sum2 = new Function('x', 'y', code);
                            sum2(x, y);
                            i++;
                            alert(x);
                            alert(y);
                        }
                    else {
                            let x = params[0];
                            var sum1 = new Function('x', code);
                            sum1(x);
                            i++;
                            alert("success");
                        }

                //    }





            });


        }







        /*  $('#quizSubmit').click(function(){ajaxCall('/student/quiz/submit', 'POST', $("#takeQuizForm").serialize(), "json", function(results){

             if(results.grade != null){
                  let cnt = '0';
                  $('#grade').text("You scored: " + results.grade + "%");

                  while(results.results[cnt] != null){

                      if(results.results[cnt] == 1){
                          $('#'+ cnt).text("correct").addClass("correct");
                      }else{
                          $('#'+ cnt).text("incorrect").addClass("incorrect");
                      }


                     // $('#'+ cnt).text((results.results[cnt]) == 1? ("correct",this.className= "correct"):("incorrect" , this.className= "incorrect"));
                     cnt++;
                  }
             }else{
                 alert(results.alert);
             }
          // alert(results);
      */
    }, ajaxFail)});



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