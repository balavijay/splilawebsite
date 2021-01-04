<!DOCTYPE html>

<html lang="en">

    <!-- HEAD -->

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title> Srila Prabhupada Lila - Quiz</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/custom.css" />
		<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto'>
    </head>

    <!-- BODY -->

    <body>

		<header class="main-header">
			<div class="top-menu navbar-fixed-top"> <div class="navbar-brand">Srila Prabhupada Lila Quiz </div></div>
		</header>


			

		<div class="body-container">

			<div id="section1" class="col-md-12 home" style="display:none;">
				<button type="button" class="btn btn-primary mb-2" onclick="javascript:hidesections(['#section1','#section3'], ['#section2'])">Start Quiz</button>
			</div>

			<div id="section2" class="col-md-12 home" >
			
			<form action="/quiz/submit.php" id="frmQuiz" method="post" >
					<input type="hidden" name="festival" id="festival" value="VE" />
					<input type="hidden" name="year" id="year" value="2020DEC" />
					<input type="hidden" name="score" id="score" value="" />
					
					

					<div class="form-group">
						<label for="exampleFormControlSelect1">Location</label>
						<select class="form-control" id="location" name="location">
							<option value="HKH">Hare Krishna Hill</option>
							<option value="VKH">Vaikunta Hill</option>
							<option value="PG">Palace Ground</option>
						 
						</select>
					</div>


					<div class="form-group">
						<label for="name">* Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
					</div>


					<div class="form-group">
						<label for="mobile">* Mobile</label>
						<input type="tel" class="form-control" id="mobile" name="mobile" onkeypress="javascript:return isNumber(event)" required placeholder="111-111-1111" />
					</div>

					
					<div class="form-group">
						<label for="email">* Email address</label>
						<input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com" />
					</div>

					
					<div class="form-group">
						<label for="age">Age</label>
						<input type="number" class="form-control" id="age" name="age" max="100"   />
					</div>
					
				
					<div class="form-group">
						<label for="testimonial">Comments</label>
						<textarea class="form-control" id="testimonial" name="testimonial" rows="3" style="width:100%"></textarea>
					</div>

					<div class="form-group" style="margin-bottom:15px">
						<label for="newsletter">Receive Newsletter</label>
						<input class="form-check-input" style="margin: 0 0 5px 5px" type="radio" name="newsletter" id="gridRadios1" value="Y" >
						<label class="form-check-label" for="gridRadios1">
							YES
						</label>
						
						<input class="form-check-input" style="margin: 0 0 5px 5px" type="radio" name="newsletter" id="gridRadios2" value="N">
						<label class="form-check-label" for="gridRadios2">
							NO
						</label>
					</div>

					<div id="displayMsg" style="display:none;" class="alert alert-danger" role="alert"></div>

					<button type="button" onclick="javascript:validateForm();" class="btn btn-primary mb-2">Continue</button>

					</form>		


			</div>
			
			<div id="section3" class="col-md-12 home"  style="display:none;" >
				<div class="quizContainer">
					<h3> Select the correct option</h3>

					<div class="question"></div>
					<ul class="choiceList"></ul>
					<div class="quizMessage"></div>
					<div class="result"></div>
					<div class="nextButton btn btn-primary mb-2">Check Answer </div>
					<div class="moveToNextSection" style="display:none;"></div>
					<br>
				
				
				</div>

 			</div>
		</div>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://www.srilaprabhupadalila.org/js/jquery.min.js"></script>
		<script src="js/quiz.js"></script>
		
		<script>


			var questions = [{
				question: "Q1. Who instructed Srila Prabhupada to spread the message of Lord Krishna throughout the world?",
				choices: ["Srila Bhaktisiddhanta Sarasvati Thakura", "Abhay Charan", "Sri Chaitanya Mahaprabhu", "Lord Krishna"],
				correctAnswer: 0
			}, {
				question: "Q2. What was Prabhupada’s name before he received diksha?",
				choices: ["Abhay Charan", "Sri Chaitanya Mahaprabhu", "Gaudiya Matha", "Srila Bhaktisiddhanta Sarasvati Thakura"],
				correctAnswer: 0
			}, {
				question: "Q3. Which magazine did Srila Prabhupada start single-handedly?",
				choices: ["Back to Home", "Back to Godhead", "Srimad Bhagavatam", "Lord Krishna"],
				correctAnswer: 1
			}, {
				question: "Q4. Which organization did Srila Prabhupada start in 1953?",
				choices: ["ISKCON", "League of Nations", "League of Devotees", "Bhaktivedanta Institute"],
				correctAnswer: 2
			}, {
				question: "Q5. Which book did Srila Prabhupada translate during the years 1962-65?",
				choices: ["Sri Isopanisad ", "Srimad-Bhagavatam", "Bhagavad-gita", "Chaitanya-caritamrita"],
				correctAnswer: 1
			}, {
				question: "Q6. At what age did Srila Prabhupada set out to spread Krishna bhakti in the West?",
				choices: ["13 ", "65", "69", "40"],
				correctAnswer: 2
			}, {
				question: "Q7.  How did Srila Prabhupada travel on his maiden journey to the West? ",
				choices: ["Cargo ship, Jaladuta ", "Passenger ship", "Airplane to New York", "Train to Belgrade"],
				correctAnswer: 0
			}, {
				question: "Q8. What were the only possessions that Srila Prabhupada took during this journey?",
				choices: ["Jaladuta sets, Rs. 40/- ", "Srimad-Bhagavatam sets, Rs. 40/-", "Srimad-Bhagavatam sets, Rs. 1,965/-", "Bhagavad-gita sets, Rs. 69/-"],
				correctAnswer: 1
			}, {
				question: "Q9. In America, Srila Prabhupada held a grand public sankirtana at____________.",
				choices: ["White House ", "26, Second Avenue", "Tompkins Square Park", "Brooklyn Bridge"],
				correctAnswer: 2
			}, {
				question: "Q10. Srila Prabhupada established _____ temples worldwide, and by his blessings today that number has increased to over ________.",
				choices: ["100, 600 ", "108, 600", "50, 100", "65, 100"],
				correctAnswer: 1
			}
			
			];

		</script>
    </body>

</html>
