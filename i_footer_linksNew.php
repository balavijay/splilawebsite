<!--div class="footerNew" style="display:none;">
    <div class="container">
    <form id="footerForm" method="post" onsubmit="return validateFooterForm();" >

        <div class="form-group">

            <input type="text" class="form-control" name="name" value="" placeholder="Enter Name" required="">

            <input type="email" class="form-control" name="email" value="" placeholder="Enter Email" required="">
            
            <button id="submitButton" class=" btn ">Subscribe</button>
            <span type="button" id="closeButton" >   <i class='fa fa-3x fa-close red '> &nbsp; </i> </span>

        </div>

    </form>

    <div id="footerMsg" class="footerMsg">
    Great! You have Successfully registered for Srila Prabhupada Lila Newsletter. You will hear from us shortly.
    </div>

    </div>
</div-->

<script>
/*
    var displayStatus =  localStorage.getItem("footerNew");

    if(displayStatus == "hide")
        $(".footerNew").hide();

    validateFooterForm =  function() {
       
        
        $.ajax({
            url: '/mail_subscribe.php',
            type: 'post',
            data: $('#footerForm').serialize(),
            success: function(data) {
                $('#footerForm').hide();
                $('#footerMsg').show();
                localStorage.setItem("footerNew", "hide");
            }
        });

        return false; 
    };


    $('#closeButton').click( function() {
        $(".footerNew").hide();
        localStorage.setItem("footerNew", "hide");
    });
    */
</script>

<style>
/*
.footerNew {
    position: fixed;
    bottom: 0;
    width:100%;
    height: 60px;
    background-color: blue;
    z-index: 100;

}

.footerNew .form-control {
    width: 25%;
    float: left;
    margin-right: 10px;
    margin-top: 10px;
}

.footerNew .btn {
    margin-top: -11px;
    margin-right: 4px;
}

.footerNew .footerMsg {
    color: #fff;
    font-size: 18px;
    padding-top: 20px;
    font-weight: 500;
}
*/

.gototop,
.gotodown,
.gototop a,
.gotodown a {
    
    bottom: 25px;
}
</style>

<footer>
        <div class="container">
            <div class="row">
                <!-- 1st column -->
                <div class="col-md-4 col-sm-4">
                
                    <!--  Subscribe section -->
                    

                </div>


                <!-- 2nd column -->
                <div class="col-md-4 col-sm-4">
                    <div class="footer-copyright" >
                        <br />
                        <p  class="wow fadeInUp" data-wow-delay="0.2s">Also check Srila Prabhupada Lila App on</p>
                        
			<a href="https://itunes.apple.com/us/app/srila-prabupada-lila/id1211997347?ls=1&mt=8" target="_blank" class="wow fadeInUp smoothScroll " data-wow-delay="1.4s">
<img src="https://anvfnzuaen.cloudimg.io/crop/120x35/x/https://sppb.blob.core.windows.net/images/download-on-the-app-store.png" alt="iOS App Store"   /></a>
			<a href="https://play.google.com/store/apps/details?id=org.srilaprabhupadalila&hl=en" target="_blank" class="wow fadeInUp smoothScroll " data-wow-delay="1.4s">
<img src="https://anvfnzuaen.cloudimg.io/crop/120x35/x/https://sppb.blob.core.windows.net/images/google-play-badge-300x89.png"  alt="Google Play Store"   /></a>

                        <br /><br /><br />

                        Connect with us on
                        <ul class="wow fadeInUp social-icon" data-wow-delay="1s">
                        <li>
                            <a href="https://www.facebook.com/Srila-Prabhupada-Lila-158671941264206/" target="_blank"  class="fa fa-facebook"></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/prabhupadalila" target="_blank" class="fa fa-twitter"></a>
                        </li>
                        
                        <li>
                            <a href="https://www.youtube.com/channel/UCCxuzpoBYfNUcE1pwR759PQ"  target="_blank" class="fa fa-youtube"></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/srilaprabhupadalila/"  target="_blank" class="fa fa-instagram"></a>
                        </li>
                    </ul>

                   
                    </div>
                    
                </div>


                <!-- 3rd column -->
                <div class="col-md-4 col-sm-4">

                    <!--  Quick link -->
                  
                </div>

            </div>
        </div>
    </footer>

