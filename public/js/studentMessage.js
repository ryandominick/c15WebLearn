document.addEventListener("DOMContentLoaded", function () {

    function initContacts(){

        ajaxCall('/student/messages/init', "GET", null, "json",  )


    }

    function updateContacts(){



    }


    function ajaxCall(url, type, data, returnType, successFunc, failFunc) {

        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: returnType,

        }).done(successFunc).fail(failFunc);
    }
    //let exitSpan = document.getElementById("exit");

    function ajaxFail(){
        alert("An error occurred");
    }


});