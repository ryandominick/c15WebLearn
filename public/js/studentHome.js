document.addEventListener("DOMContentLoaded", function(event) {
    // Get element that opens the popup
    var popup = document.getElementById('popup');
    // Get element that opens the popup
    var openPopup = document.getElementById("takeQuizButton");
    // Get the <span> element that closes the popup
    var exitButton = document.getElementsByClassName("exit")[0];
    // When the user clicks openPopup, open the popup
    openPopup.onclick = function () {
        popup.style.display = "block";
    }
    // When the user clicks on <span> (x), close the popup
    exitButton.onclick = function () {
        popup.style.display = "none";
    }
    // if the user clicks anywhere outside of the popup
    window.onclick = function (event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
});