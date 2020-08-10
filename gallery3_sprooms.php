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
<!-- 
    <div class="preloader">
    Loading ...
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


<?php
    include "mail_error.php";
?>    




<section id="about" class="parallax-section" style="display:<?=$dynamicSection?>">
        <div class="container">


            
            
            <?php 

                $display_photo = "";
                $display_content = "";
                $display_title = "";
                $summary = "";
                $cid = "";
                $counter = 0;


                foreach($datajson->resource as $item)
                {
                    $counter++;

                    if($item->photo_url)
                        $display_photo = $item->photo_url;
                    else
                        $display_photo = $item->thumbnail_url;


                        $display_photo = str_replace("_thumb","", $display_photo);
                        
                        // Till poetry folder has valid photos
                        $display_photo = str_replace("poetry","sanskrit_sloka", $display_photo);
                    
                    
                    if($item->title)
                        $display_title = $item->title;

                        $content_text = str_replace('src="https://poly.google.com/','id="iframe_' . $counter . '" data-src="https://poly.google.com/', $item->content_text);
                        
                        $summary = "";
                        if($item->summary)
                        $summary = $item->summary;
            
                        $reference = $item->reference;

                        $cid = $item->id;

                        if($counter <= 10){

                        if($counter%2 == 1)
                        {

            ?> 
            
                        
                            <!-- color1 Section -->
                            <div class="row m-pad-bottom">
                                <div class="col-md-6 col-sm-12">
                                    <div class="about-thumb">

                                        <?php
                                            if($display_title != null)
                                            {
                                        ?>

                                                <div class="wow  section-title" >
                                                    <h1><?=$display_title?></h1>
                                                   
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        
                                        <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="335">
                                            <p><?=$content_text?> </p>
                                            
                                            <?php
                                                if($reference != null)
                                                {
                                            ?>
                                                    <p class="reference"><b>Reference:</b> <?=$reference?> </p>

                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <a class="cr_showhide wow fadeInUp smoothScroll section-btn btn btn-success" onclick="javascript:displayiframe('iframe_<?=$counter?>');" data-wow-delay="0.2s"></a>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div><a href="/read/<?=$cid?>" target="_blank" ><img class="gallery3-img" data-src-analogies="<?=$cid?>" ci-src="<?=$display_photo?>" height="" width="100%" /></a></div>
                                </div>
                            </div>
                            
                            <?php
                                } else {
                            ?>

                                <!-- color2 Section -->
                                <div class="row bg-yellow m-pad-top">
                                    <div class="col-md-6 col-sm-12">
                                        <div><a href="/read/<?=$cid?>" target="_blank" ><img  class="gallery3-img" data-src-analogies="<?=$cid?>" ci-src="<?=$display_photo?>" height="" width="100%" /></a></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="about-thumb">

                                        <?php
                                            if($display_title != null)
                                            {
                                        ?>

                                                <div class="wow  section-title" >
                                                    <h1><?=$display_title?></h1>
                                                    
                                                </div>
                                        <?php
                                            }
                                        ?>
                                            
                                            <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="335">
                                                <p><?=$content_text?> </p>

                                                <?php
                                                    if($reference != null)
                                                    {
                                                ?>
                                                        <p class="reference"><b>Reference:</b> <?=$reference?> </p>

                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <a class="cr_showhide wow fadeInUp smoothScroll section-btn btn btn-success" onclick="javascript:displayiframe('iframe_<?=$counter?>');" data-wow-delay="0.2s"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>                                 
        
            <?php 
    
                } // End of For-loop 1
            ?>
        

          </div>
     </div>
</section>

    <script>
        $('.gallery3-img').error(function() {

            var page_type = "<?=$page_type?>";
            if(page_type == "srila-prabhupada-analogies"){

                var analogiesImg = $(this).attr("data-src-analogies");
                $(this).attr("src" , "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/analogies/xxxhdpi/" + analogiesImg +".png");
                
            }
           else {

                $(this).attr("src" , "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/analogies/xxxhdpi/AC300.png");
           }

            
      });
    </script>


<!-- Auto Card Loader Section -->
<?php

    $recordCount = count($datajson->resource);
    
    if ( $recordCount > 10 ){
        
        include "i_gallery3_sprooms_loader.php";
    }
    
?>
    
    <script>
        $("#iframe_1").attr("src", $("#iframe_1").attr("data-src"));
        
        displayiframe = function(iframe) {
            if(iframe != 'iframe_1');
                $("#" + iframe ).attr("src", $("#" + iframe ).attr("data-src"));
        }
    </script>

    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>


    <script src="https://sppbcdn.azureedge.net/files/js/continue-reading.js"></script>

   
    <!-- Lazy loading Section -->
    <?php
    include "lazyload-cloudimg.php";
    ?>
   

</body>

</html>
