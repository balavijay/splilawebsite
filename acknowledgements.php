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
    
    $page_type = $_GET['q'];
    
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
    
    

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Head includes Section -->
    <?php
    include "i_head_scripts.php";
    ?>
    <?php
    include "i_styles.php";
    ?>
    	

    <!-- PRE LOADER -->

    <div class="preloader">
        Loading ...
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


$metadata_url = "data/pagedescription.JSON";


$metadata  = file_get_contents($metadata_url);


if($metadata === FALSE)

{

    /* No content from server */

    $show_error = true;

}else{

    $metadatajson = json_decode($metadata);
   

    if($metadatajson == NULL)

        $show_error = true;

    else if( $metadatajson->errCode != 0)

        $show_error = true;


}

?>		


 <?php
    
    $page_topImage = "";
    foreach($metadatajson->resource as $item){
        if($item->content_type && $item->content_type == $page_type)
        {
             $page_title = $item->title;
             $page_content_text  = $item->content_text;
             $page_content_url  = $item->content_url;
             
           
             if($item->topImage)
                $page_topImage =   $item->topImage;
            else 
                $page_topImage = "ic_sp_1.jpg";

        }
    }


    $acks = array();

	

	array_push($acks, array("H.G. Bhaktisiddantha Dasa", "hg-bsd.png"));

	array_push($acks, array("H.H. Giriraja Swami", "hh-gs.png"));

	array_push($acks, array("H.G. Gurudas Dasa", "hg-gp.png"));

	array_push($acks, array("H.G. Harisauri Dasa", "hg-hp.png"));

	array_push($acks, array("H.G. Kurma Dasa", "hg-kp.png"));

	array_push($acks, array("H.H. Lokanath Swami", "hh-ls.png"));

	array_push($acks, array("H.G. Mahamaya Devi Dasi", "hg-mm.png"));

	array_push($acks, array("H.H. Mahanidhi Swami", "hh-ms.png"));

	array_push($acks, array("H.G. Siddantha Dasa", "hg-sp.png"));

	

	array_push($acks, array("H.G. Sruthakirthi Dasa", "hg-shrutakirthi-prabhu.png"));

	array_push($acks, array("H.G. Vaiyasaki Dasa", "hg-vp.png"));

	array_push($acks, array("H.G. Yadubara Dasa", "hg-yp.png"));

    
?>


    <!-- Main Section -->

    <section id="inner" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-sm-2">
                    <div class="inner-thumb-img" ><img src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/<?=$page_topImage?>" class="innerImg" /></div>
                </div>

                <div class="col-md-9 col-sm-9">
                    <div class="inner-thumb">
                        <div class="section-title">
                             
                            <h1 class="wow fadeInUp" data-wow-delay="0.6s"> <?=$page_title?> </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.9s"> <?=$page_content_text?>  </p>

                         

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


<section class="g-100">

<div class="container" style="background-color: white">

    



    

    <div class="row m-pad-bottom">

        

    <div class="col-md-12 col-sm-12" >
    <br /><br />

        <p>

            <i><span style="font-weight:bold;">S</span>rila Prabhupada Lila</i> is a mobile app and website developed by a team of devotees 

            working to increase awareness and appreciation of Srila Prabhupada, 

            his message, saintly personality, mission and institution. We were able to work on this project only by the blessings of the Vaishnava

            community, Srila Prabhupada and all the Acharyas. We are indebted to various authors who had painstakingly recorded memories of Srila 

            Prabhupada in various biographical works. Owing to their effort, the second generation of devotees in ISKCON are able to get a glimpse 

            of what it was to be with Srila Prabhupada.

        </p>

        

        <p><span style="font-weight:bold;">W</span>e are especially grateful and profusely thank the 

            following devotees and disciples of Srila Prabhupada who agreed to share their 

            works online on this website:

        </p>

    

    

        <div class="memory-box">

            <ul>

                

<?php						



            foreach($acks as $a)

            {

                $name = $a[0];

                $img = $a[1];

?>



                <li class="col-md-3">

                    <div class="ack-box">					

                        <img class="img-responsive img-hover" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/ack/<?=$img?>" alt="">

                        <h4><?=$name?></h4>

                    </div>

                </li>

<?php

            }							

?>

                

                <!--

                    <li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>

                    <li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>

                    <li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>

                    <li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>

                    <li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>

                -->

            </ul>

        </div>

        

        <div >


            <p>

                <span style="font-weight:bold;">A</span>ll photos of Srila Prabhupada used herein are courtesy of the Bhaktivedanta Book Trust International Inc. 

                - www.krishna.com. Used with permission. If you find any copyright violations in this app and website please notify us so that we may 

                remove it.

            </p>

            <p><span style="font-weight:bold;">W</span>e invite devotees from all over the world to share more pastimes of 

                Srila Prabhupada through this website so that it can reach the community of devotees. 

                

            </p>

        </div>

                    

                        
                        <br /><br />
    </div>
    </div>
</div>

</section>

    
    <!--  Gallery links -->
    <?php
        include "i_section_links.php";
    ?>


    

    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>
    
    <style>
        li {
            list-style-type: none
        }
    </style>
   

</body>

</html>
