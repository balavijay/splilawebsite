<script type="text/javascript">
      var onloadCallback = function() {
        console.log("text", this);
        console.log(grecaptcha);
        grecaptcha.render('html_element', {
          'sitekey' : '6LfFTEEaAAAAAO9jAFO_xFeZH6L4Z8c1JOdaP_pY'
        });
      };

      function get_action(form) 
      {
          var v = grecaptcha.getResponse();
          if(v.length == 0)
          {
              document.getElementById('captcha').innerHTML="Please validate Captcha";
              return false;
          }
          else
          {
              document.getElementById('captcha').innerHTML="Captcha completed";
              document.getElementById("subscribeForm").submit();
              return true; 
          }
      }
    </script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>


                    <div class="list-group custom-list-group ql-section" >									

                        <div class="card-body">

                            <h1>Subscribe to Newsletter</h1>

                            <p>Enter your mail address and subscribe to Srila Prabhupada Today Newsletter.</p>

                            <form method="post" id="subscribeForm" action="/mail_subscribe.php">

                                <div class="form-group">

				                    <input type="text" class="form-control" name="name" value="" placeholder="Enter Your Name" required=""><br>
	
                                    <input type="email" class="form-control" name="email" value="" placeholder="Enter Your Email" required="">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    <br />

                                    <div id="html_element"></div>
                                    <div id="captcha"></div>

                                    <!--div class="g-recaptcha" data-sitekey="6LfFTEEaAAAAAO9jAFO_xFeZH6L4Z8c1JOdaP_pY"></div-->

                                    <button  
                                        type='button' onclick="javascript:get_action();">Submit</button>

                                </div>

                            </form>

                        </div>

                        <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:srilaprabhupadalila@gmail.com">srilaprabhupadalila@gmail.com</a>
                       

                    </div>


                    
