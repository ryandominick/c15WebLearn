

// NEED TO ADD USER ID IN QUERY AND FORMAT CSS FOR BOTTOM TABLE + COMMENT

$(document).ready(function(){

        var quizResults = $('#quizResults tbody');
        var pageTable = $('#pageTable tbody tr');

        var searchButton = $('#searchButton');
        var results;
        var pages;
        var index = 0;
        var max;

        var search;
        var displayed = false;



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(searchButton).click( search = function(){

    $.ajax({
        url: '/student/search/query',
        type: 'POST',
        data: $("#searchQuery").serialize(),
        dataType: "json",

    }).done(function (quizzes) {

        $('.pages').parent().remove();
        //remove appended results

         max = quizzes.length -1;
        if(max + 1 > 20)
            pages = (((max +1) - ((max +1) % 20)) / 20) + 1;
         else pages = 1;

        results = quizzes;

        for(var i = 1; i <= pages; i++){

            pageTable.append('<td>' + '<p class=pages  >' + i +'</p>' + '</td>');
        }

        if(displayed === false){

            updateResults();
            displayed = true;
        }

        $('.pages').click(function(e) {

            index = (e.currentTarget.innerHTML -1) * 20;
            updateResults();

        });




        }).fail(function (jqXHR, exception) {

            // Add fail condition
        });
        });

    function updateResults(){

        var count = 0;
        var quiz;

        quizResults.children().remove();

        while(index <= max && count < 20){
            quiz = '<tr>' + '<td>' + results[index].quizTitle +  '</td>' + '<td>' + results[index].moduleCode +  '</td>' + '<td>' + results[index].moduleName +  '</td>' + '<td>' + results[index].quizEnd +  '</td>' + '<td>' + results[index].grade +  '</td>'+ '</tr>';
            quizResults.append(quiz);
            count++;
            index++;
        }
    }

        search();

});


