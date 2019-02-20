document.addEventListener("DOMContentLoaded", function(event) {
    //Get the popup
    var popup = document.getElementById('popup');
    // Button that opens the popup
    var popupButton = document.getElementById("takeQuizButton");
    // Span element that exits from the popup
    var exitSpan = document.getElementsByClassName("exit")[0];
    // On click on popupButton open the popup
    popupButton.onclick = function() {
        popup.style.display = "block";
    }
    // When the user clicks on <span> (X), exit the popup
    exitSpan.onclick = function() {
        popup.style.display = "none";
    }
    // If user clicks outside of the modal, exit from popup
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
});