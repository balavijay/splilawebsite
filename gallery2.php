<?php



		

	session_start();

		

	$_SESSION['start'] = true;

	$_SESSION['SEO'] = SEO;



    include_once("common.php");
    
    $page_type = $_GET['q'];

    $img_prefix = "";
    $img_type   = "";

    if( $page_type == "quotes" ){
        $img_prefix = "QU";
        $img_type   = "quote";
    }
        
    else if( $page_type == "srila-prabupada-rare-pictures" )
    {
        $img_prefix = "RP";
        $img_type   = "rare_picture";
    }
        
    
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
    <link rel="shortcut icon" href="/images/favicon.png" >
    

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
	if($page_content_url){

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

<?php
    include "mail_error.php";
?>  


<link rel="stylesheet" href="https://www.srilaprabhupadalila.org/css/lightgallery.css" />
<section id="experience" class="parallax-section" style="display:<?=$dynamicSection?>">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="color-white experience-thumb">
                         

                         <div class="wow fadeInUp color-white media" data-wow-delay="1.2s">
                            <div class="demo-gallery">
                            
                                <ul id="lightgallery" class="list-unstyled row">
                                <?php 

                                    

                                    foreach($datajson->resource as $item)
                                    {
                                        $display_title = $item->title;
                                        $thumbnail_photo = $item->thumbnail_url;
                                        $display_photo = $item->photo_url;

                                ?> 
                                
                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/width/900/webp/<?=$display_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/200x150/webp/<?=$display_photo?>"> 
                                                    </a>
                                                </li>
                                
                                <?php 
                                         // End of If 
                                    } // End of For-loop 1
                                ?>
                               
                                </ul>
                            </div><!--    demo-gallery -->
                         </div>

                         

                    </div>
               </div>

          </div>
     </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
    $('#lightgallery').lightGallery();
});

    $('.gallery3-img').error(function() {
        
        $(this).parent().parent().hide();
    });
</script>
<script src="https://sppbcdn.azureedge.net/files/js/lightgallery-all.min.js"></script>

    






    
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
