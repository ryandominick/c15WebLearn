
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
    $(searchButton).click( search = function(){ajaxCall('/teacher/search/query', 'POST', $("#searchQuery").serialize(), "json", function(quizzes){
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
            /*
               selectRecordSetup is responsible for adding event listeners to all the quiz result records (table rows visible from a search) the event triggers the drop down
               of an extended list which in turn triggers a search for all the student attempts on the associated quizID if the search has not already been completed
             */
            selectRecordSetup();
        } else {
            /* updateNoResults is a simple function which displays the no results div if no results are found */
            updateNoResults();
        }

    }, ajaxFail)});

    //((tmpInput = $("#searchQuery").serialize()) && tmpInput !== "searchInput="? tmpInput : "searchInput=\r")
    search();

    function updateNoResults() {

        quizResults.children().remove();
        pageTable.children().remove();

        document.getElementById("noResults").style.display ="block";

    }

    function updateResults(){

        let count = 0;
        let quiz;

        document.getElementById("noResults").style.display ="none";
        quizResults.children().remove();


        while(index <= max && count < 20){
            quiz = '<tr class="quizRecord">' + '<td>' + results[index].quizTitle +  '</td>' + '<td>' + results[index].moduleCode +  '</td>' +
                   '<td>' + results[index].moduleName +  '</td>' + '<td>' + results[index].quizEnd +  '</td>' +
                   '<input type="hidden" class="quizIDs" value=' + results[index].quizID + '> ' + '</tr>' +
                   '<tr class="studentResults">' + '<td colspan="4">'  + '<table class="studentResults1">' + '<tbody>' +
                   '</tbody>' +'</table>' +  '</td>' + '</tr>' ;
            quizResults.append(quiz);
            count++;
            index++;

        }
    }

    function updateQuizAttempts(quizAttempts,recordQuiz){

        let i = 0;
        let quizAttempt;

        while ( i < quizAttempts.length) {
            quizAttempt = '<tr class="studentAttempt">' + '<td>' + quizAttempts[i].firstName + '</td>'  + '<td>' + quizAttempts[i].lastName +
                          '</td>'  + '<td>' + quizAttempts[i].grade + '</td>' + '</tr>';
            // Was unable to use append again as only the JQuery version is capable of adding elements
            recordQuiz.innerHTML += quizAttempt ;
                i++;
        }
    }

    function selectRecordSetup() {

        let i;
        let quizRecord = $(".quizRecord");
        let studentResults1 = $(".studentResults1 tbody");
        let studentGradeTB ;

        for (i = 0; i < quizRecord.length; i++) {

            studentGradeTB = studentResults1[i];

            quizRecord[i].addEventListener("click", function () {
                /* Toggle upon click so that the record can remain highlighted through CSS */
                this.classList.toggle("active");

                if(!studentGradeTB.firstChild){

                     ajaxCall('/teacher/search/expand', 'POST', ("quizID=" + this.lastElementChild.value),
                         "json", function(quizAttempts){
                             if(quizAttempts.length >= 1) {
                                 updateQuizAttempts(quizAttempts, studentGradeTB);
                             }
                    }, ajaxFail);
                }

                let studentResults = this.nextElementSibling;
                if (studentResults.style.display === "table-row") {
                    studentResults.style.display = "none";

                } else {
                    studentResults.style.display = "table-row";
                }
            });
        }
    }


    function updatePageNum(quizzes) {

        let i;

        //remove appended results
        $('.pages').parent().remove();

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
                selectRecordSetup();

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


    function ajaxFail(){
        alert("An error occurred");
    }

});