<?php



	define("SEO", "enabled");



	if(SEO == "enabled")

		$mlink = "/srila-prabhupada-memories";

	else

		$mlink = "memory_home.php";

		

	session_start();

		

	$_SESSION['start'] = true;

	//$_SESSION['session_id'] = "201995d0-7f48-11e7-892f-0242e32748bc-56";

	$_SESSION['SEO'] = SEO;



	include_once("common.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
    <meta name="apple-itunes-app" content="app-id=1211997347">


    <title>Srila Prabhupada Lila</title>
    
    <meta property="og:url" content="http://www.srilaprabhupadalila.org/index.php" />

    <meta property="og:type" content="article" />

    <meta property="og:image" content="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/srila-prabhupada-01.jpg" />

    <meta property="og:title" content="Srila Prabhupada Lila" />

    <meta property="og:description" content="The life and teachings of a pure devotee. His Divine Grace A.C. Bhaktivedanta Swami Srila Prabhupada. Founder Acharya of the International Society for Krishna Consciousness " />
   

    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    
    <link rel="stylesheet" href="css/templatemo-style.min.css">
    <link rel="stylesheet" href="css/i_menu.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="shortcut icon" href="https://sppbcdn.azureedge.net/images/favicon.ico" >


    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-101536342-1"></script>

    <script>

    window.dataLayer = window.dataLayer || [];

    function gtag(){dataLayer.push(arguments);}

    gtag('js', new Date());

    gtag('config', 'UA-101536342-1');

    </script>

    <script src="js/jquery.js"></script>

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


    <!-- PRE LOADER -->

    <div class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </div>


    <!-- Navigation Section -->

    <?php
    include "i_menu_items.php";
    ?>	

    

<?php

$show_error = false;

$day = date("d");

$mon = date("m");



$date_str = date("F") . "-" . $day;


$today_url = "http://srilaprabhupadalila.com/v2/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:$day,month:$mon,strips:1&resolution=xxxhdpi";


$today  = file_get_contents($today_url);


if($today === FALSE)

{

    /* No content from server */

    $show_error = true;

}else{

    $json = json_decode($today);
   

    if($json == NULL)

        $show_error = true;

    else if( $json->errCode != 0)

        $show_error = true;


}

?>		



    <section id="about" class="parallax-section">
    <div class="container">
        <div class="row  m-pad-bottom" style="background: #4280d0; color:#fff;">

            <div class="col-md-12" style="padding:10px 20px 20px 20px;">
            
                <h1>Minified CSS n JS Version</h1>
                
            </div>
        </div>
    </div>
    </section>

    <!-- Home Section -->

    <section id="home" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-5 col-sm-5" style="padding:0px;">
                    <div class="home-img"></div>
                </div>

                <div class="col-md-7 col-sm-7">
                    <div class="home-thumb">
                        <div class="section-title home-title" >
                            
                       
                            <span class="wow fadeInUp" data-wow-delay="0.2s" > The life and teachings of a pure devotee </span>
                                
                            <span><h1>His Divine Grace A.C. Bhaktivedanta Swami Srila Prabhupada</h1> </span>
                            <span class="small" >Founder Acharya of the International Society for Krishna Consciousness</span>
                            


                            <br /><br />

                            <span  class="wow fadeInUp" data-wow-delay="0.2s">
                                <i>
                                Know his
                                
                                <a href="/srila-prabhupada-memories" >glorious pastimes</a>,  
                                <a href="/srila-prabhupada-analogies" >analogies</a>, 
                                <a href="/108_temples" >temples</a>
                                 and more ... 
                                </i>
                            </span> 
                                                        

                            <!-- <p  class="wow fadeInUp" data-wow-delay="0.2s">Also check Srila Prabhupada Lila App on</p> 
                            
                            <a href="https://itunes.apple.com/us/app/srila-prabupada-lila/id1211997347?ls=1&mt=8" target="_blank" class="wow fadeInUp smoothScroll section-btn btn btn-success" data-wow-delay="1.4s">Apple</a>
                            <a href="https://play.google.com/store/apps/details?id=org.srilaprabhupadalila&hl=en" target="_blank" class="wow fadeInUp smoothScroll section-btn btn btn-success" data-wow-delay="1.4s">Andriod</a> -->

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>





    <?php

    if($show_error)

    {
        include "mail_error.php";

    }else{

    ?>

        <!-- Cards Section -->
        <?php
            include "i_homepage_cards.php";
        ?>	


        <!-- Quotes Section -->
        <?php
            include "i_quotes.php";
        ?>
        


    <?php
    } // End of If-else
    ?>

    <!--  Gallery links -->
    <?php
        include "i_section_links.php";
    ?>

    <!-- Testimonials Section -->
    <?php
            include "i_testimonials.php";
    ?>

    <!-- Auto Card Loader Section -->
    <?php
            include "i_auto_card_loader.php";
    ?>

    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    
    

    <!-- Scripts -->

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.min.js"></script>
<script src="js/smoothscroll.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.min.js"></script>



<!--- Did you Know section  -->
<?php
    include "did_you_know.php";
?>
   

</body>

</html>
