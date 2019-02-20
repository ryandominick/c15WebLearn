document.addEventListener("DOMContentLoaded", function() {

    var modal = document.getElementById('popup');

    var btn = document.getElementsByClassName("removeStudentButton");

    var span = document.getElementsByClassName("exit")[0];

    var popupButton = function() {
        modal.style.display = "block";
    }
    for (var i = 0; i < btn.length; i++) {
       btn[i].addEventListener('click', popupButton, false);
    }
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});