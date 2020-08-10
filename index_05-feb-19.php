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
    <meta name="description" content="His Divine Grace, A.C. Bhaktivedanta Swami Prabhupada (1896-1977) is the founder-acharya of International Society for Krishna Consciousness (ISKCON), popularly known as Hare Krishna Movement. Srila Prabhupada established 108 temples around the world over a span of 11 years (1966 - 1977). He is widely regarded as the ambassador of Bhakti Yoga. He has millions of followers across the globe">
    <meta name="keywords" content="srila prabhupada memories, srila prabhupada pastimes, about srila prabhupada, srila prabhupada quotes, srila prabhupada pictures">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
    <meta name="apple-itunes-app" content="app-id=1211997347">



    <title>Srila Prabhupada Lila</title>
    
    <meta property="og:url" content="https://www.srilaprabhupadalila.org/index.php" />

    <meta property="og:type" content="article" />

    <meta property="og:image" content="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/srila-prabhupada-01.jpg" />

    <meta property="og:title" content="Srila Prabhupada Lila" />

    <meta property="og:description" content="The life and teachings of a pure devotee. His Divine Grace A.C. Bhaktivedanta Swami Srila Prabhupada. Founder Acharya of the International Society for Krishna Consciousness " />
    
    
    <?php
    include "i_head_scripts.php";
    ?>   

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
   
    <!-- Styles and Head includes -->
    <?php
    include "i_styles.php";
    ?>
	

    <!-- PRE LOADER -->

    <!-- <div class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
            <br /><br /><br /><br /><br />
            <p><b>Srila Prabhupada Lila loading ... </b></p>
        </div>
    </div> -->


    <!-- Navigation Section -->

    <?php
    include "i_menu_items.php";
    ?>	

    

<?php

$show_error = false;

$day = date("d");

$mon = date("m");



$date_str = date("F") . "-" . $day;


$today_url = "http://srilaprabhupadalila.com/v2/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:$day,month:$mon,strips:1,web:1&resolution=xxxhdpi";


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


    <!--section id="about" class="parallax-section">
    <div class="container">
        <div class="row  m-pad-bottom" style="background: #4280d0;">

            <div class="col-md-12" style="padding:10px 20px 20px 20px;">
            
                <h1>Srila Prabhupada Disappearance Lila</h1>
                <br >
                <ul >
                    <li style="display: inline-block; margin:5px; "><a style="color:#fff; font-size:18px; font-weight:400;" href="/day01.php" > Day01 - Vrindavana <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada%20in%20Vrindavana%201977.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style="color:#fff; font-size:18px; font-weight:400;" href="/day02.php" > Day02 - Hrisikesh <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada%20preaching.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style="color:#fff; font-size:18px; font-weight:400;" href="/day03.php" > Day03 - Vrindavana <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada%20having%20Deity%20Darshan.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style="color:#fff; font-size:18px; font-weight:400;" href="/day04.php" > Day04 - London <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada's%20last%20visit%20to%20England.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style="color:#fff; font-size:18px; font-weight:400;" href="/day05.php" > Day05 - Bombay <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Prabhupada%20in%20Bombay.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style="color:#fff; font-size:18px; font-weight:400;" href="/day06.php" > Day06 - Vrindavana <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada's%20accepts%20samadhi.png" width="200px" alt=" "></a></li>
                </ul>
            </div>
        </div>
    </div>
    </section-->


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




    <?php
    } // End of If-else
    ?>




    <!-- Auto section Loader  -->
    <?php
            include "i_auto_section_loader.php";
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
    <?php
        include "i_script_links.php";
    ?>

<!--- Did you Know section  -->
<?php
   // include "did_you_know.php";
?>
   

</body>

</html>
