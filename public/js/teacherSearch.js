
$(document).ready(function(){

    //alert(studentDetails);
    // variables used to manipulate and track DOM elements in creating and removing search rows while storing placeholders
    //alert($url);
    let quizResults = $('#quizResults tbody');
    let pageTable = $('#pageTable tbody tr');

    let searchButton = $('#searchButton');
    let results;
    let pages;
    let index = 0;
    let max;

    // search is assigned the function for carrying out a query so that an initial search can be performed automatically
    let search;

    //let studentDetails = JSON.parse(window.localStorage.getItestudentDetails.urlm('student'));

    // The jquery ajax wrapper is set up with Laravels csrf protection to prevent failure
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(searchButton).click( search = function(){

        $.ajax({
            url: '/teacher/search/query',
            type: 'POST',
            data: $("#searchQuery").serialize(),
            dataType: "json",

        }).done(function (quizzes) {

            index = 0;
            updatePageNum(quizzes);
            updateResults();

            $('.pages').click(function(e) {

                index = (e.currentTarget.innerHTML -1) * 20;
                updateResults();

            });


        }).fail(function (jqXHR, exception) {

            // Add fail condition
        });
    });

    function updateResults(){

        let count = 0;
        let quiz;

        quizResults.children().remove();

        while(index <= max && count < 20){
            quiz = '<tr class="quizRecord">' + '<td>' + results[index].quizTitle +  '</td>' + '<td>' + results[index].moduleCode +  '</td>' + '<td>' + results[index].moduleName +  '</td>' + '<td>' + results[index].quizEnd +  '</td>' + '</tr>';
            quizResults.append(quiz);
            count++;
            index++;

        }
    }

    function updatePageNum(quizzes){

        $('.pages').parent().remove();
        //remove appended results

        max = quizzes.length -1;
        if(max + 1 > 20)
            pages = (((max +1) - ((max +1) % 20)) / 20) + 1;
        else pages = 1;

        results = quizzes;

        for(let i = 1; i <= pages; i++){

            pageTable.append('<td>' + '<p class=pages  >' + i +'</p>' + '</td>');
        }
    }

    search();

});