<!DOCTYPE html>
<html lang="en">
<head>
  <title>Support Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<br /><br />  
<div class="container">
<div class="row">
  <div class="col-md-6 col-sm-6">
  
        <div class="panel panel-default">
          <div class="panel-heading"><b>With your Time</b></div>
          <div class="panel-body">

            <p>
                
              You may help us by in by giving your time and effort.
              You can do voluntary practical service. These can be done even from your home. We need help in tagging pastimes, transcription and video editing. If you have any of these skills please register below:
            </p>


            <form  method="post"  action="/mail_supportus.php">

		<input type="hidden" name="SupportByTime" value="support">
              <div class="form-group">
                <label for="pwd">Name:</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" required name="name">
              </div>

              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" required name="email">
              </div>

              <div class="form-group">
                <label for="pwd">Service:</label>
                <input type="text" class="form-control" placeholder="Enter what Service you would like to do" required name="service">
              </div>

              <div class="form-group">
                <label for="pwd">What thing inspired you:</label>
                <input type="text" class="form-control" placeholder="What thing inspired you" required name="inspired">
              </div>

              <button type="submit" class="btn btn-default">Submit</button>
            </form> 

          </div>
        </div>

  </div>

  <div class="col-md-6 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading"><b>With your Money </b></div>
            <div class="panel-body">
              <p>
              You may support our activities monetarily.
              This website is developed and maintained by a group of devotees as a seva apart from their regular jobs. We do not wish to burden any temple or organization for expenses nor do we run any ads or any commercial activities of any sort. Yet as you will be aware developing the web site, developing the content, maintaining the servers, and our other infrastructure come at a certain cost.
              Thus, we humbly request you to make a donation to support the activities of Srila Prabhupada Lila and be a part of glorious mission. 
              </p>

              <button type="submit" class="btn btn-default">Donate Now</button>
            </div>
          </div>
  </div>
</div>
</div>
 
</body>
</html>
