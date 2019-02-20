
$(document).ready(function(){


    // variables used to manipulate and track DOM elements in creating and removing search rows while storing placeholders

    let quizResults = $('#quizResults tbody');
    let pageTable = $('#pageTable tbody tr');

    let searchButton = $('#searchButton');
    let results;
    let pages;
    let index = 0;
    let max;


    // search is assigned the function for carrying out a query so that an initial search can be performed automatically
    let search;
    let tmpInput;


    // The jquery ajax wrapper is set up with Laravels csrf protection to prevent failure
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* JQuery is used to add an event listener to the search button which contains an AJAX post request for the results of the search */
    $(searchButton).click( search = function(){ajaxCall('/student/search/query', 'POST', $("#searchQuery").serialize(), "json", function(quizzes){
        index = 0;

        if(quizzes.length >= 1) {
            /* updatePageNum is responsible for amending the page numbers in conjunction with the number of search results 20 per page
               it also removes the previous search's page numbers and adds an event listener to each page number which will update the page with the corresponding
               set of quiz results
             */
            updatePageNum(quizzes);
            /*
               updateResults is responsible for removing the previous searches page results, hiding the no results found div and populating the current page with 20 of the first
               new results and storing the rest in the global results variable. Called in the context of a page number click event it will do the same but with the results corresponding
               to the correct page.
             */
            updateResults();
            startQuizEvents();
            modalExits()

        } else {
            /* updateNoResults is a simple function which displays the no results div if no results are found */
            updateNoResults();
        }

    }, ajaxFail)});

    //((tmpInput = $("#searchQuery").serialize()) && tmpInput !== "searchInput="? tmpInput : "searchInput=\r")
    search();

    function updateResults() {

        let count = 0;
        let quiz;

        document.getElementById("noResults").style.display ="none";
        quizResults.children().remove();

        while (index <= max && count < 20) {
            quiz = '<tr class="quizRecord">' + '<td>' + results[index].quizTitle + '</td>' + '<td>' + results[index].moduleCode + '</td>' + '<td>' + results[index].moduleName +
                '</td>' + '<td>' + results[index].quizEnd + '</td>' + '<td>' + (results[index].grade == null ? "Incomplete" : results[index].grade) + '</td>' +
                '<input type="hidden" class="quizIDs" value=' + results[index].quizID + '> ' +
                '<input type="hidden" class="durations" value=' + results[index].duration + '> ' + '</tr>';
            quizResults.append(quiz);
            count++;
            index++;

        }
    }

    function updateNoResults() {

        quizResults.children().remove();
        pageTable.children().remove();

        document.getElementById("noResults").style.display ="block";

    }


    function startQuizEvents() {

        let i;
        let quizRecord = $(".quizRecord");
        //let modal = document.getElementById('popup');

        for (i = 0; i < quizRecord.length; i++) {

            quizRecord[i].addEventListener("click", function () {


                document.getElementById('popup').style.display = "block";

            });
        }
    }

    function modalExits(){

        let popup = document.getElementById('popup');

        $(".exit").click(function(){
          popup.style.display = "none";
        });

        // WHY DOES THIS WORK ?
        $(window).click(function(event){
            if (event.target == popup) {
                popup.style.display = "none";
            }
         });

    }


    function updatePageNum(quizzes) {

        let i;

        $('.pages').parent().remove();
        //remove appended results

        max = quizzes.length - 1;
        if (max + 1 > 20)
            pages = (((max + 1) - (tmp = ((max + 1) % 20))) / 20) + (tmp !== 0 ? 1 : 0);
        else pages = 1;

        results = quizzes;

        for (let i = 1; i <= pages; i++) {

            pageTable.append('<td>' + '<p class="pages"  >' + i + '</p>' + '</td>');
        }


        let pageNum = document.getElementsByClassName("pages");

        for (i = 0; i < pageNum.length; i++) {

            pageNum[i].addEventListener("click", function () {

                index = (this.innerHTML -1) * 20;
                updateResults();
                startQuizEvents();
                modalExits()

            });
        }
    }


    function ajaxCall(url, type, data, returnType, successFunc, failFunc) {

        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: returnType,

        }).done(successFunc).fail(failFunc);
    }
 var exitSpan = document.getElementById("exit");

    function ajaxFail(){
        alert("An error occurred");
    }



});