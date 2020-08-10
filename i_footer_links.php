

<style>

.gototop,
.gotodown,
.gototop a,
.gotodown a {
    
    bottom: 25px;
}
</style>

<footer id="footer">
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
<img id="img-apple" data-src="https://anvfnzuaen.cloudimg.io/crop/120x35/x/https://sppb.blob.core.windows.net/images/download-on-the-app-store.png" alt="iOS App Store"   /></a>
			<a href="https://play.google.com/store/apps/details?id=org.srilaprabhupadalila&hl=en" target="_blank" class="wow fadeInUp smoothScroll " data-wow-delay="1.4s">
<img id="img-google" data-src="https://anvfnzuaen.cloudimg.io/crop/120x35/x/https://sppb.blob.core.windows.net/images/google-play-badge-300x89.png"  alt="Google Play Store"   /></a>

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

<script>
    var footerimg = false;
    $(window).scroll(function() {
        var hT = $('#footer').offset().top,
        hH = $('#footer').outerHeight(),
        wH = $(window).height(),
        wS = $(this).scrollTop();
       
        if (wS + 100 > (hT+hH-wH)){
            if( footerimg == false ){
                footerimg = true;
                $("#img-apple").attr("src", $("#img-apple").attr("data-src"));
                $("#img-google").attr("src", $("#img-google").attr("data-src"));
            }
        }
    });
    
</script>
