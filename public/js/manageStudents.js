document.addEventListener("DOMContentLoaded", function() {

    var modal = document.getElementById('popup');

    var span = document.getElementsByClassName("exit")[0];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        //add eventListener to each button in the table
    $('.removeStudentButton').each(function(){

        (this).addEventListener('click', popupButton);

    });

    function popupButton(x, id){
        //if response from AJAX, remove the row with the given ID
        if(x === 1){
            var tableRow = $("td").filter(function() {
                return $(this).text() === id;
            }).closest("tr");
            tableRow.remove();
        }else {
            //find ID of student on row that delete button was clicked and show confirmation modal
            modal.style.display = "block";
            let id = $(this).closest('.studentRow').find('#studentID').html();
            //
            $('.deleteStudentConfirm').click(function(){
                //executes removeStudent function with the student's ID and closes modal
                removeStudent(id);
                modal.style.display = "none";
            });


        }
    }

    function removeStudent(id) {
        //sends an AJAX request to the server with the ID of the student to be deleted
        $.ajax({
            type: 'post',
            url: '/teacher/manageStudents/remove',
            data: {"studentID":id},
            dataType: 'json',
            success: function(data){

                //executes popupButton function with "1" if deletion was completed
                popupButton(data,id);

            }

        }).done();
    }
    //closes modal if x is clicked
    span.onclick = function() {
        modal.style.display = "none";
    };

    //closes modal if windows that is not modal is clicked
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});