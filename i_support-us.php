
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


	    <form  method="post" onsubmit="return validateForm();"  action="mail/mail_local.php">
		  <input type="hidden" name="SupportByTime" value="support">
      <input type="hidden" name="type" value="SERVICE">

              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text"  class="form-control" minlength="5" placeholder="Enter Your Name"  required name="name" id="name">
              </div>

              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email"  required name="email" id="email">
              </div>

              <div class="form-group">
                <label for="service">Service:</label>
                <input type="text" class="form-control" minlength="10" placeholder="Enter what Service you would like to do" required name="title" id="title">
              </div>

              <div class="form-group">
                <label for="inspired">What thing inspired you:</label>
                <input type="text" class="form-control" minlength="10" placeholder="What thing inspired you" required name="description" id="description">
              </div>

              <button type="submit" class="btn btn-default section-btn btn btn-success">Submit</button>
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

              <button onclick="javascript:donatePop();" class="btn btn-default section-btn btn btn-success"><i class='fa fa-usd red'></i>  Donate Now</button>
            </div>
          </div>
  </div>
</div>
</div>
 
<script>
function validateForm()
{   
    $('#name').val( $.trim($('#name').val()));
    $('#email').val( $.trim($('#email').val()));
    $('#title').val( $.trim($('#title').val()));
    $('#description').val( $.trim($('#description').val()));

    if( $('#name').val().length < 5 ||  $('#title').val().length < 5 ||  $('#description').val().length < 5 ){
      return false;
    }


    
}

function donatePop(){
  window.open("https://www.instamojo.com/@SrilaPrabhupadaLila/");
}
</script>
