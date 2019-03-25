
document.addEventListener("DOMContentLoaded", function () {
    // // Get element that opens the popup
    // var popup = document.getElementById('popup');
    // // Get element that opens the popup
    // var openPopup = document.getElementById("takeQuizButton");
    // // Get the <span> element that closes the popup
    // var exitButton = document.getElementsByClassName("exit")[0];
    // // When the user clicks openPopup, open the popup
    // openPopup.onclick = function () {
    //     popup.style.display = "block";
    // }
    // // When the user clicks on <span> (x), close the popup
    // exitButton.onclick = function () {
    //     popup.style.display = "none";
    // }
    // // if the user clicks anywhere outside of the popup
    // window.onclick = function (event) {
    //     if (event.target == popup) {
    //         popup.style.display = "none";
    //     }
    // }




    // get the table by its ID
    let table = document.getElementById("studentTable");
    // get all table rows

    let rows = table.getElementsByTagName("tr");

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