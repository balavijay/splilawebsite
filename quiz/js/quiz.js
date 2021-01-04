

		function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;

            return true;
        }    

        function validateForm() {   
            var flag = 0;
            $("#displayMsg").html("");
            $("#displayMsg").hide();

            $('#name').val( $.trim($('#name').val()));
            if($('#name').val().length <= 3){
                $("#displayMsg").show().append(" • </i> Enter valid Name. <br /> ");
                flag++;
            }

            $('#mobile').val( $.trim($('#mobile').val()));
            if($('#mobile').val().length <= 9){
                $("#displayMsg").show().append(" • </i> Enter valid Mobile. <br /> ");
                flag++;
            }
            
            $('#email').val( $.trim($('#email').val()));
            if($('#email').val().length <= 3){
                $("#displayMsg").show().append(" • </i> Enter valid Email id. <br /> ");
                flag++;
            }

            if(flag == 0 ) {
                hidesections(['#section1','#section2'], ['#section3'])	
            } else {
                $("#displayMsg").show();
            }

        }


        function hidesections(hidearr, showarr) {
            hidearr.forEach((item)=> { 
                $(item).hide();
            });

            showarr.forEach((item)=> { 
                $(item).show();
            });
        }

        var currentQuestion = 0;
        var correctAnswers = 0;
        var quizOver = false;

        $(document).ready(function () {

            // Display the first question
            displayCurrentQuestion();
            $(this).find(".quizMessage").hide();

            // On clicking next, display the next question
            $(this).find(".nextButton").on("click", function () {
                if (!quizOver) {

                    value = $("input[type='radio']:checked").val();

                    if (value == undefined) {
                        $(document).find(".quizMessage").text("Please select an answer");
                        $(document).find(".quizMessage").show();
                    } else {
                        // TODO: Remove any message -> not sure if this is efficient to call this each time....
                        $(document).find(".quizMessage").hide();

                        if (value == questions[currentQuestion].correctAnswer) {
                            correctAnswers++;
                        }

                        $(".nextButton").hide();
                        $("input[name=dynradio][value=" + value + "]").parent().css("color","red");
                        $("input[name=dynradio][value=" + questions[currentQuestion].correctAnswer + "]").parent().css("color","green");
                        setTimeout(function(){ 

                            $(".nextButton").show();

                            currentQuestion++; // Since we have already displayed the first question on DOM ready
                            if (currentQuestion < questions.length) {
                                displayCurrentQuestion();
                            } else {
                                displayScore();
                                //                    $(document).find(".nextButton").toggle();
                                //                    $(document).find(".playAgainButton").toggle();
                                // Change the text in the next button to ask if user wants to play again
                                //$(document).find(".nextButton").text("Play Again?");
                                $(".nextButton").hide();
                                $(document).find(".moveToNextSection").show();
                                quizOver = true;
                            }

                         }, 1000);

                        
                    }
                } else { // quiz is over and clicked the next button (which now displays 'Play Again?'
                    quizOver = false;
                    $(document).find(".nextButton").text("Next Question");
                    resetQuiz();
                    displayCurrentQuestion();
                    hideScore();
                }
            });

        });

        // This displays the current question AND the choices
        function displayCurrentQuestion() {

            console.log("In display current Question");

            var question = questions[currentQuestion].question;
            var questionClass = $(document).find(".quizContainer > .question");
            var choiceList = $(document).find(".quizContainer > .choiceList");
            var numChoices = questions[currentQuestion].choices.length;

            // Set the questionClass text to the current question
            $(questionClass).text(question);

            // Remove all current <li> elements (if any)
            $(choiceList).find("li").remove();

            var choice;
            for (i = 0; i < numChoices; i++) {
                choice = questions[currentQuestion].choices[i];
                $('<li><input type="radio" class="form-check-input" id=rad_'+ i +' value=' + i + ' name="dynradio" />' 
                    + '<label class="form-check-label" for=rad_'+ i +' >' +  choice + '</label>'
                    + '</li>').appendTo(choiceList);
            }
        }

        function resetQuiz() {
            currentQuestion = 0;
            correctAnswers = 0;
            hideScore();
        }

        function displayScore() {
            var resultTxt = "You scored: " + correctAnswers + " out of: " + questions.length;
            $(document).find(".quizContainer > .result").text(resultTxt);
            $(document).find(".quizContainer > .result").show();
            $("#score").val(correctAnswers);

            setTimeout(function(){ 
                document.getElementById("frmQuiz").submit();
            }, 1000);
            

        }

        function hideScore() {
            $(document).find(".result").hide();
        }
