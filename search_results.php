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
    <meta name="google-site-verification" content="onSh7fXq9QjtvocKY6mCJdObgziOAzjvevS7n4t-Woo" />

    <title>Srila Prabhupada Lila</title>
    <link rel="shortcut icon" href="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.nethttps://sppbcdn.azureedge.net/images/favicon.ico" >
    
    <?php
    include "i_head_scripts.php";
    ?>	

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Head includes Section -->
    <?php
    include "i_styles.php";
    ?>

    <!-- PRE LOADER -->

    <div class="preloader">
        <div class="">
            <span >Loading Search Results ...</span>
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
    // $page_type = "srila-prabupada-rare-pictures";
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

        $data_url = $page_content_url . urlencode(":") . urlencode($_POST["txt_search"] . ",web:1");
        

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
                            <p class="wow fadeInUp" data-wow-delay="0.9s"> for  " <?=$_POST["txt_search"]?> "</p>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>






<section id="about" class="parallax-section" style="display:<?=$dynamicSection?>">
        <div class="container">

  
                
            <?php 
            if($datajson->errCode == '-1'){
            ?>

                <h3><?=$datajson->message?></h3>

            <?php
            }
            ?>

               

            <?php 
                $counter = 0;
                foreach($datajson->resource as $item)
                {
                    $counter++;

                    if($counter <= 50 )
                    {
                        $display_title = $item->title;

                        $content_url = $item->id;                                

                        if($item->content_text)
                            $content_text = $item->content_text;
                        else
                            $content_text = $item->title . "<br> <br> ";
                        

                        if( !$item->thumbnail_url || $item->thumbnail_url == "https://anvfnzuaen.cloudimg.io/cover/108x108/webp/null" )
                            {
                                $item->thumbnail_url = "https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/ic_sp_lila_1.jpg";
                            } 
                        $thumbnail_url = $item->thumbnail_url;

            ?> 
            

                        <div class="col-md-6 col-sm-6 search-snippets">
                            <div class="list-group custom-list-group set-box location-list">
                            <div class="story-pic"></div>
                            <a  href="<?=$content_url?>" target="_blank" class="list-group-item ">
                                <span style="height:64px;">
                                    <img class="card-img-top" align="left" ci-src="<?=$thumbnail_url?>"  > 
                                    <span>
                                        <span class="list-group-item-heading" data-toggle="ellipsis" data-type="chars" data-count="60" ><?=$display_title?></span> <br />
                                        <span class="list-group-item-text" data-toggle="ellipsis" data-type="chars" data-count="100" ><?=$content_text?> </span>
                                    </span>
                                </span>
                            </a>
                            </div>
                        </div>
                                                                
        
            <?php 
                    }
                } // End of For-loop 1
            ?>
        

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

<style>
.search-snippets span, .search-snippets span strong, .search-snippets span p {
    display: inline !important;
    font-weight: normal !important;
    padding: 0px !important;
}

.search-snippets img {
    padding-right: 10px;
    width: 74px !important;
}

.search-snippets .list-group-item-heading {
    font-weight: 600 !important;
}

div.ci-image-wrapper {
    display: inline;
    margin-right: 10px;
}

.list-group-item-text {
    margin-left: 10px;
}
</style>

<script>
$(function() {

$("font").removeProp("face");
$("font").removeProp("size");
$("font").removeProp("color");
$("font").prop("class", "fontclass");
$("span").removeProp("style");



});
</script>     
<script src="js/jquery.ellipsis.js"></script>

    <!-- Lazy loading Section -->
    <?php
    include "lazyload-cloudimg.php";
    ?>

</body>

</html>
