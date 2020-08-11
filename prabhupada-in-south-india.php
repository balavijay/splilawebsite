<?php


		

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
    <link rel="shortcut icon" href="https://sppbcdn.azureedge.net/images/favicon.ico" >

    <?php
    include "i_head_scripts.php";
    ?>    

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Head includes Section -->
    <?php
    include "i_styles.php";
    ?>
	

   


    <!-- Navigation Section -->
    <?php
    include "i_menu_items.php";
    ?>	

    

<?php

$show_error = false;


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

    <section id="about" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

            <div class="about-thumb">
                
                <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="330">
                    <p>
                    
                    Prabhupada in South India is the first book to comprehensively cover Srila Prabhupada’s pastimes in the southern India peninsular.
                    <br /><br />

                    Between 1971 and 1976 Srila Prabhupada visited South India nine times. Teaching the science of Krishna bhakti he held massive
                    pandal programs and vibrant harinam processions, met with many people of prominence and initiated iconic projects.
                    <br /><br />

                    Join Rajasekhara Dasa Brahmacari, an early Prabhupada disciple and international author, as he takes you on an adventerous
                    devotional journey where Srila Prabhupada and his disciples defeat the philosophical challenge of numerous mutts and panditas and
                    establish the supremacy of Krishna consciousness. Relish heartfelt narrations of people—students, doctors, industrialists,
                    statesmen, spiritualists—who have been deeply touched by Srila Prabhupada.
                    <br /><br />

                    Prabhupada in South India includes exclusive historical records, sweet recollections from dozens of Prabhupada disciples and never
                    before seen photos of Prabhupada.
                    <br /><br />

                    Participate in this historic project. <br />
                    Preparing this book involved meeting Prabhupada disciples and recording their memoirs, transcribing, historical research, authoring,
                    and publishing. The expenses total Rs. 9,75,000/- ($13,000). <br /><br />
                    We need your help in meeting these expenses. <br /><br />

                    <b>Donate </b>: <br />

                    Your donation will help in subsidising the cost of the book. <br />


                    <div class="container">
                    <div class="row">
                    <div class="col-md-6 col-sm-6">

                        <?php
                            include "i_form_sp_south_india.php";
                        ?>
                    </div>
                    </div>
                    </div>

                    
                    <br /><br />

                    <b>Special gift for your donation</b>: <br />
                    You will receive a special copy of the book autographed by Rajasekhara Prabhu shipped to your address.
                    <br /><br />

                    <b>Contact us</b>: <br />
                    Srila Prabhupada Foundation<br />
                    <a href="mailto:donate@srilaprabhupadalila.org " >donate@srilaprabhupadalila.org</a><br />

                    <br /><br />
                    Prabhupada in South India is published by Srila Prabhupada Foundation, a charitable trust registered in Vrindavana. Proceeds from
                    the sales will support the preservation and propagation projects of Srila Prabhupada Lila.                    
                    </p>
                    
                   
                </div>
                <a class="cr_showhide wow fadeInUp smoothScroll section-btn btn btn-success" data-wow-delay="0.2s"></a>
            </div>            
                
            </div>
    </div>


    </div>
    </section>



    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>

   

</body>

</html>
