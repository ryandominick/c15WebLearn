
document.addEventListener("DOMContentLoaded", function () {


    // get the table by its ID
    let table = document.getElementById("studentTable");
    // get all table rows

    let rows = table.getElementsByTagName("tr");

    // for each table row add an event listener which will when clicked add the rows time and quizID to the modal and setup the exit events after displaying it
    for( let i = 0; i < rows.length; i++){
        rows[i].addEventListener("click", function(){




           $("#time").text($(this).children("td:last").text());
           $("#quizID").val($(this).children("td:hidden").children("input:hidden").val());
            document.getElementById('popup').style.display = "block";
            modalExits();

        })
    }

// provides two ways to exit modal, X and click out
    function modalExits(){

        let popup = document.getElementById('popup');

        $(".exit").click(function(){
            popup.style.display = "none";
        });

        // WHY DOES THIS WORK ?
        $(window).click(function(event){
            if (event.target === popup) {
                popup.style.display = "none";
            }
        });

    }

});