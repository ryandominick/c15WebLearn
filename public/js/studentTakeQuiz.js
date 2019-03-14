document.addEventListener("DOMContentLoaded", function () {


    // The jquery ajax wrapper is set up with Laravels csrf protection to prevent failure
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $('#quizSubmit').click(function(){ajaxCall('/student/quiz/submit', 'POST', $("#takeQuizForm").serialize(), "json", function(results){

       if(results.grade != null){
            let cnt = '0';
            $('#grade').text("You scored: " + results.grade + "%");

            while(results.results[cnt] != null){

                $('#'+ cnt).text((results.results[cnt]) == 1? "correct":"incorrect");
               cnt++;
            }
       }else{
           alert(results.alert);
       }
    // alert(results);

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