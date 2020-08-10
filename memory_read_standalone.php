<?php

 

	session_start();

	include_once("common.php");

	

	$_SESSION['session_id'] = "201995d0-7f48-11e7-892f-0242e32748bc-56";

	$page_url = "http://" . $_SERVER['HTTP_HOST'] .  "/" . $_SERVER['REQUEST_URI'];

	$routedTemp = 1;


	if($routedTemp)
	{
		
		$uri = $_SERVER['REDIRECT_URL'];

		$paths = explode ("/",$uri);

		$paths_temp = explode ("?",end($paths));

		$type = $paths[0];

		$rid = $paths_temp[0];

		$type = "Home";

		



	}else{

		

		die("");

	}

		

		

	$cat = null;



	

	//$type_readble = readable_string($type);

	//$type_seo 	  = seo_friendly_string($type);

	

	$show_error = false;

	

	$url = "http://srilaprabhupadalila.com/v2/api/content?queryId=QUERY_GET_CONTENT&args=content_id:$rid,web:1";


	$data  = file_get_contents($url);

	

	if($data === FALSE)

	{

			/* No content from server */

		$show_error = true;

	}else{

		$json = json_decode($data);

		if($json == NULL)

			$show_error = true;

		else if( $json->errCode != 0)

			$show_error = true;

		

		if(!isset($json->resource))

			$show_error = true;

	}		



	

	

	if($show_error)
		header("Location: /");

	

	$memory = $json->resource[0];

	if(isset($memory->title) && strlen($memory->title))

		$title = $memory->title;

	else

		$title = get_home_card_type($rid);

		

	$content = $memory->content_text;

	$photo_url = $memory->photo_url;

	$video_url = $memory->video_url;
	$video_path = explode ("/",$video_url);

	

	$narrated_by_name = $memory->narrated_by_name;
	$reference = $memory->reference;

	$social_media_url = $photo_url;

	$ua = $_SERVER['HTTP_USER_AGENT'];



	

	



	/* Build Reference Div */	

	$reference_html = "";


	if(isset($memory->reference) && $memory->reference != NULL)

	{

		$ref = $memory->reference;

		$reference_html ="<b>Reference:</b> <i>$ref</i><br>";



	}else if(isset($memory->summary) && $memory->summary != NULL){

		$ref = $memory->summary;

		$reference_html ="<b>Reference:</b> <i>$ref</i><br>";

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
    





	<meta property="og:type" content="article" />

	<meta property="og:image" content="<?=$social_media_url?>" />

	

	

	<meta name="google-site-verification" content="onSh7fXq9QjtvocKY6mCJdObgziOAzjvevS7n4t-Woo" />
	

<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101536342-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'UA-101536342-1');

</script>

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
		
    <!-- Styles and Head includes -->
	<?php
    include "i_head_scripts.php";
    ?>
    <?php
    include "i_styles.php";
    ?>
    	





    <!-- Navigation Section -->
    <?php
    include "i_menu_items.php";
    ?>	


    <section class="g-200">

		<div class="container">

			<div class="row">

<?php

			$class_for_center_if_home = "col-md-offset-2";

			if($cat != null)

			{

				$seo_cat_title = seo_friendly_string($cat_title);

				$class_for_center_if_home = "";

?>



<?php

			}

?>			

<style>
	.img-responsive {
		max-width: 50%;
		padding-right: 20px;
		
	}

	.video-responsive {
		width: 640px;
		height: 360px;
		
	}

	.img-responsive-icon{
		position: absolute;
		top:0;
		left:0;
		opacity:0.8;

	}

	.ci-image-wrapper {
			display: inline !important;
	}

	@media(max-width:768px) {
            .img-responsive  {
                max-width:100%;
                padding:0px !important;
			}
			.video-responsive {
				width: 90%;
				height: auto;	
			}
        }
	
	
	ul {
		list-style-type: square;
		padding-left: 15px;
	}

	li  {
		
		margin-bottom: 10px;
	}
</style>	

<meta property="og:url" content="<?=$page_url?>" />
<meta property="og:title" content="<?=$title?>" />
<meta property="og:description" content="<?=$title?>" />

				<div class="col-md-9  img-portfolio">

					<div class="article-box">

						<div class="art-img-box">

							<h1><?=$title?></h1>

							<?php
								if($video_path[3]){
							?>
								
								<a id="thumbnail-click">		
									<img class="img-responsive" style="padding-right: 20px !important;" ci-src="<?=$photo_url?>?mark_url=https://sppb.blob.core.windows.net/images/click-to-play.png&mark_width=450&mark_pos=center" alt="" align="left" />
								</a>
							<?php
								} else {
							?>
								 <div class="demo-gallery"  >
                            
									<ul id="lightgallery"   class="list-unstyled row">
										<li data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/<?=$photo_url?>"  >
										
											<img id="heroimage"  src="https://anvfnzuaen.cloudimg.io/width/300/webp/<?=$photo_url?>" style="padding-right: 20px !important; " >
										
										</li>
									</ul>
								</div>
							<?php
								}
							?>							
							<div class="ptag">
							<?=$content?>
							</div>
							<br /><br />

						</div>

						<div class="art-para">

							

						</div>

						<div class="art-para">

							<?=$reference_html?>

							<br />
							<?php
								include "i_socialmedia_share.php";
							?>

						</div>

					</div>

				</div>

				<div id="col-recommended" class="col-md-3 ">
					<br /><br />
					<div id="recentContainer" class="panel panel-default">
					<div class="panel-heading"><b>Recently Added</b></div>
					<div class="panel-body">
						<ul id="recent" class="related">
						<?php
							
							
							
							$metadata_url = "http://srilaprabhupadalila.com/v2/api/user?queryId=QUERY_GET_USER_WHATS_NEW&args=resolution:xxxhdpi,web:1";
							$metadata  = file_get_contents($metadata_url);
							$metadatajson = json_decode($metadata);

							$counter = 0;

							foreach($metadatajson->resource as $item){

								
								
								if ($counter < 5   )
								{
									
									$counter++;
						?>
									
									<li ><a href="<?=$item->content_id?>" target="_blank" >  <?=$item->title?> </a> </li>
						
						<?php
								}
							}
						?>
						</ul>
					</div>
					</div>


					<br />
					<div id="trendingContainer" class="panel panel-default">
					<div class="panel-heading"><b>Trending Today</b></div>
					<div class="panel-body">
						<ul id="trending" class="related">
						<?php
							
							
							
							$metadata_url = "http://srilaprabhupadalila.com/v2/api/ga?queryId=QUERY_TRENDING";
							$metadata  = file_get_contents($metadata_url);
							$metadatajson = json_decode($metadata);

							$counter = 0;

							foreach($metadatajson->resource as $item){

								
								
								if ($counter < 5   )
								{
									
									$counter++;
						?>
									
									<li ><a href="<?=$item->card->content_id?>" target="_blank" >  <?=$item->card->title?> </a> </li>
						
						<?php
								}
							}
						?>
						</ul>
					</div>
					</div>


					<br /> 
					<div id="relatedContainer" class="panel panel-default">
					<div class="panel-heading"><b>Related Memories</b></div>
					<div class="panel-body">
						<ul id="related" class="related">
						<?php
							if($reference) {
								$searchArray = explode (" ",$reference);	 
								$searchText = $searchArray[count($searchArray) - 2];
							} else if($narrated_by_name) {
								$searchArray = explode (" ",$narrated_by_name);
								$searchText = $searchArray[0];
							}
							
							$searchText = $searchText ? $searchText : 'Hari';
							
							
							$metadata_url = "http://srilaprabhupadalila.com/api/search?queryId=QUERY_SEARCH&args=query_text:" . $searchText;
							$metadata  = file_get_contents($metadata_url);
							$metadatajson = json_decode($metadata);

							$counter = 0;

							foreach($metadatajson->resource as $item){
								
								if($counter < 5 && $item->title )
								{
									$counter++;
						?>
									
									<li ><a href="https://srilaprabhupadalila.org/<?=$item->id?>" target="_blank" > <?=$item->title ?> </a> </li>
						
						<?php
								}
							}
						?>
						</ul>
					</div>
					</div>
					

				</div>
				<style>
					#thumbnail-click, #lightgallery {
						cursor: pointer;
					}

					.demo-gallery {
						display: flex;
						justify-content: center;
					}

					#heroimage {
						margin-left: -80px;
					}
				</style>
				<script type="text/javascript">
				$(document).ready(function(){

					$("span").removeProp("style");
					if ($("#recent").has( "li" ).length == 0 )
						$("#recentContainer").hide();
					if ($("#related").has( "li" ).length == 0 )
						$("#relatedContainer").hide();
					if ($("#trending").has( "li" ).length == 0 )
						$("#trendingContainer").hide();
						
						var img = "#thumbnail-click img.img-responsive";
						var img_icon = "#thumbnail-click img.img-responsive-icon";
						
						$(img_icon).width($(img).width());
						$(img_icon).height($(img).height());

						$( img_icon ).offset({ top: $(img).offset().top, left: $(img).offset().left });

				


					$("#thumbnail-click").on("click", function(){

					
						var img = "#thumbnail-click img.img-responsive";
						var img_icon = "#thumbnail-click img.img-responsive-icon";
						
						var i_width = $(img).width();
						var i_height = $(img).height();

						var iframe = document.createElement('iframe');
						iframe.id = "vframe";
						// iframe.src = "https://www.youtube.com/embed/<?=$video_path[3]?>?autoplay=1";
						iframe.width = i_width;
						iframe.height = i_height;
						iframe.frameborder = 0;
						iframe.allow='autoplay'

						$(img).attr("src", "");
						$(img_icon).attr("src", "");

						$( iframe ).insertAfter( "#thumbnail-click" );
						$("#thumbnail-click").remove();

						$("#vframe").attr("src", "https://www.youtube.com/embed/<?=$video_path[3]?>?autoplay=1&rel=0")

					

					}); 

				});
				</script>				

			</div>

		</div>

	</section>



<br /><br /><br />


    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>


<script src="https://sppbcdn.azureedge.net/files/js/bootstrap.min.js"></script>
<script src="https://sppbcdn.azureedge.net/files/js/jquery.parallax.js"></script>
<script src="https://sppbcdn.azureedge.net/files/js/smoothscroll.js"></script>
<script src="https://sppbcdn.azureedge.net/files/js/wow.min.js"></script>
<script src="https://sppbcdn.azureedge.net/files/js/custom.js"></script>

	
<script>
$(function() {

$("font").removeProp("face");
$("font").removeProp("size");
$("font").removeProp("color");
$("font").prop("class", "fontclass");


});
</script>     

<link rel="stylesheet" href="https://www.srilaprabhupadalila.org/css/lightgallery.css" />
<script type="text/javascript">
$(document).ready(function(){
    $('#lightgallery').lightGallery();
});

setTimeout(function(){ $('#lightgallery').lightGallery(); }, 1000);
   
</script>
<script src="https://sppbcdn.azureedge.net/files/js/lightgallery-all.min.js"></script>


    <!-- Lazy loading Section -->
    <?php
    include "lazyload-cloudimg.php";
    ?>
</body>



</html>

