<?php



	define("SEO", "enabled");




		

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

    $dynamicSection = "block";
	if(isset($page_content_url)){

		$data_url = $page_content_url;
		$data  = file_get_contents($data_url);
		$dynamicSection = "block";

		if($data === FALSE)

		{

			/* No content from server */

			$show_error = true;

		}else{

			$datajson = json_decode($data);
		

			if($datajson == NULL)

				$show_error = true;

			else if( $datajson->errCode != 0)

				$show_error = true;


		}

		} // if $page_content_url is not blank
		else {
			$dynamicSection = "none";
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




    <section id="about" class="parallax-section" style="display:<?=$dynamicSection?>">
        <div class="container">
        <div class="row" style="margin:20px;">
        <div  class="col-md-9 col-sm-9">
            <?php
                foreach($datajson->resource as $item){			
                   $title = $item->title; 	
            ?>
              

                <div class="panel panel-default">
                <div class="panel-heading"><b><?=$title?></b></div>
                <div class="panel-body">

                <?php
                    foreach($item->childs as $child){			
                    
                        $id = $child->id;	
                        $subtitle = $child->title;	
                        $photo_url = $child->photo_url;	
                ?>  
                        <div style="margin-bottom: 10px;">
                        <a href="/read/<?=$id?>" target="_blank" > 
                            <img src="https://anvfnzuaen.cloudimg.io/cover/64x64/webp/<?=$photo_url?>" />
                            <b><?=$subtitle?></b>
                        </a>
                        </div>
                
                <?php
                    }
                ?>                                 
                </div>
                </div>
              
               
            <?php
                }
            ?>

        </div>
        </div>
        </div>
    </section>
    

<?php
    include "mail_error.php";
?>    







    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>

   
    <!-- Lazy loading Section -->
    <?php
    include "lazyload-cloudimg.php";
    ?>
   
<style>
</style>
</body>

</html>
