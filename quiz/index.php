<!DOCTYPE html>

<html lang="en">

    <!-- HEAD -->

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Privacy Policy for Srila Prabhupada Lila</title>
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

			<div class="top-menu navbar-fixed-top">
			</div>
		</header>


			

		<div class="body-container">
			<div class="col-md-12 home">
				<form action="/quiz/submit.php" method="post" >
					<input type="hidden" name="festival" id="festival" value="VE" />
					<input type="hidden" name="year" id="festival" value="2020DEC" />

					<div class="form-group">
						<label for="exampleFormControlSelect1">Location</label>
						<select class="form-control" id="location">
							<option value="HKH">Hare Krishna Hill</option>
							<option value="VKH">Vaikunta Hill</option>
							<option value="PG">Palace Ground</option>
						 
						</select>
					</div>


					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
					</div>


					<div class="form-group">
						<label for="mobile">Mobile</label>
						<input type="tel" class="form-control" id="mobile" name="mobile" required placeholder="111-111-1111" />
					</div>

					
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com" />
					</div>

					
					<div class="form-group">
						<label for="age">Age</label>
						<input type="number" class="form-control" id="age" name="age" max="100" required  />
					</div>
					
				
					<div class="form-group">
						<label for="testimonial">Comments</label>
						<textarea class="form-control" id="testimonial" name="testimonial" rows="3" style="width:100%"></textarea>
					</div>

					<button type="submit" class="btn btn-primary mb-2">Submit</button>

					</form>		

 			</div>
		</div>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>
