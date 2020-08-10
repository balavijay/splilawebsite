<?php



	session_start();

	include_once("common.php");

	

	$_SESSION['session_id'] = "201995d0-7f48-11e7-892f-0242e32748bc-56";

    $q = $_GET['q'];

    $paths = explode ("/",$q);

    $type = $paths[1];

	$rid = end($paths);
	
	$kid =  $paths[sizeof($paths) - 2];


	if($type == "location")
		$resource_id="location_id";
	else if($type == "devotee")
		$resource_id="devotee_id";
	else if($type == "quality")
		$resource_id="quality_id";
	else if($type == "topic")
		$resource_id="keyword_id";



    
    $cstr = get_home_card_type($rid);


	$cat = null;


	$type_readble = readable_string($type);

	$type_seo 	  = seo_friendly_string($type);

	

	$show_error = false;

	

	$url = "http://srilaprabhupadalila.com/v2/api/content?queryId=QUERY_GET_CONTENT&args=content_id:$rid,$resource_id:$kid,web:1";

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

		die();

	

	$memory = $json->resource[0];

	if(isset($memory->title) && strlen($memory->title))

		$title = $memory->title;

	else

		$title = get_home_card_type($rid);

		

	$content = $memory->content_text;

	$photo_url = $memory->photo_url;

	
	$video_url = $memory->video_url;
	$video_path = explode ("/",$video_url);

	$previous = $memory->previous;
	if($previous){
		$previous_url = "https://srilaprabhupadalila.org/srila-prabhupada-memories#/" . $type . "/" .  $paths[sizeof($paths) - 4] . "/title/"  . $kid . "/" . $previous;
	}

	$next = $memory->next;
	if($next){
		$next_url = "https://srilaprabhupadalila.org/srila-prabhupada-memories#/" . $type . "/" .  $paths[sizeof($paths) - 4] . "/title/"  . $kid . "/" . $next;
	}
	

	

    $thumbnail_url = str_replace("xxxhdpi","hdpi",$photo_url);

	$social_media_url = $photo_url;

	$ua = $_SERVER['HTTP_USER_AGENT'];

	if(strstr($ua,"WhatsApp"))

		$social_media_url = str_replace("xxxhdpi", "mdpi", $social_media_url);

	else if(strstr($ua, "Facebot"))

		$social_media_url = str_replace("xxxhdpi", "hdpi", $social_media_url);

	

	$sc = $rc = $fc = $dc = 0;

	if(isset($memory->shares_count))

		$sc = $memory->shares_count;

	if(isset($memory->read_count))

		$rc = $memory->read_count;

	if(isset($memory->favourite_count))

		$fc = $memory->favourite_count;

	if(isset($memory->download_count))

		$dc = $memory->download_count;	



	/* Build Reference Div */	

	$reference_html = "";

	



		$book_name = NULL;

		$author = NULL;

		

		if(isset($memory->book_name) && $memory->book_name != NULL)

			$book_name = $memory->book_name;

	

		if(isset($memory->author) && $memory->book_name != NULL)

			$author = $memory->author;

		

		if($book_name != NULL && $author != NULL)

			$reference_html = "

							<b>Reference:</b> <i>$book_name</i><br>

							<b>Author: </b><i>$author</i>";



		




	

function get_category_info($type, $cid)

{

	$resource = "location";

		

	if($type == "Locations")

		$resource = "location";

	else if($type == "Devotees")

		$resource = "devotee";

	else if($type == "Qualities")

		$resource = "quality";

	else if($type == "Topics")

		$resource = "keyword";	

		

	$sid  = $_SESSION['session_id'];

	$url = "http://srilaprabhupadalila.com/v2/api/$resource?queryId=QUERY_ALL&args=dummy:dummy,resolution:xxxhdpi,web:1&session_id=$sid";

	

	$data  = file_get_contents($url);

	if($data === FALSE)

	{

		return null;

	}else{

		$json = json_decode($data);

		if($json == NULL)

			return null;

		else if( $json->errCode != 0)

			return null;

		

		foreach($json->resource as $cat)

		{

			if($cat->id == $cid)

				return $cat;

		}

	}

	

	return null;

}






?>






<?php

	if($type != "Home")

	{

		$cat1 = ucfirst($paths[0] . "s");

        $cat2 = ucfirst($paths[1]);
        $cat_readble = readable_string($paths[2]);
		$title_readble = readable_string($paths[3]);
		$standloneurl = end($paths);

?>

		
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/srila-prabhupada-memories">Memories</a></li>
            <li class="breadcrumb-item"><a href="javascript:load_memory_by('<?=$paths[1]?>')"><?=$cat2?></a></li>
            <li class="breadcrumb-item"><a href="javascript:load_memory_cat('<?=$paths[1]?>')"><?=$cat_readble?></a></li>
            <li class="breadcrumb-item active" data-toggle="ellipsis" data-type="chars" data-count="50"> <?=$memory->title?> </li>
        </ol>      

		

<?php
		
	}
?>



		


    <!--link href="https://www.srilaprabhupadalila.org/css/lightgallery.css" rel="stylesheet"-->
    <section class="g-200">

		<div class="container container-read">

			<div class="row">

			

				<div class="col-md-10  img-portfolio">
                    <div class="art-img-box ">
                        <h3><?=$title?></h3>
                        <!--
                        <div class="demo-gallery">
                            <ul id="lightgallery" class="list-unstyled row">
                            <li class="memory-li"  data-src="<?=$photo_url?>" data-sub-html="<?=$title?>">
                        -->
                                

								<div class="article-box ">
								
								<?php
									
									if($video_path[3]){
										
								?>
										<a id="thumbnail-click">
									
											<img class="img-responsive" style="padding-right: 20px !important;" ci-src="<?=$thumbnail_url?>?mark_url=https://sppb.blob.core.windows.net/images/click-to-play.png&mark_width=450&mark_pos=center" alt="" align="left" />
											
										</a>
								<?php
									} else {
										
								?>
											<img class="img-responsive" align="left" style="padding:10px;" onclick="javascript:window.open('/<?=$standloneurl?>')" src="<?=$thumbnail_url?>" alt="" > 
								<?php
									}
								?>
									

									<div class="art-para"><?=$content?></div>
									<br />
									<div class="art-para"><?=$reference_html?></div>

								</div>

								<div>
								<?php
									if($previous){	
								?>
										<a onclick="javascript:changeTrigger('<?=$previous_url?>');" class="section-btn btn btn-success" > << Pervious </a>
								<?php
									}
								?>

								<?php
									if($next){	
								?>								
										<a onclick="javascript:changeTrigger('<?=$next_url?>');" class="section-btn btn btn-success" > Next >> </a>
								<?php
									}
								?>
								</div>		



								<meta property="og:url"                content="<?=$standloneurl?>" />
								<meta property="og:type"               content="article" />
								<meta property="og:title"              content="<?=$title?>" />
								<meta property="og:description"        content="Srila Prabhupada Lila" />
								<meta property="og:image"              content="<?=$thumbnail_url?>" />

								<br />

								

								<?php
								include "i_socialmedia_share.php";
								?>
								<br /><br />								
                            <!--    
                            </li>
                            </ul>
                        </div>
						-->
                    </div>
                </div>

             				
				
                <div id="col-recommended_<?=$cat2?>" class="col-md-2  ">
				   



				   
                </div>

			</div>

		</div>

	</section>



    
    
    <!--script src="https://sppbcdn.azureedge.net/files/js/lightgallery-all.min.js"></script-->
    <script type="text/javascript">

	function changeTrigger(url) {
		location.href=url;
		setTimeout(function(){ location.reload(); }, 1000);
		//location.reload();
	}

    $(document).ready(function(){
		

		

		if($('#lightgallery .memory-li').attr("data-sub-html") == ""){
			var pageURL = window.location.href;
			//$('#lightgallery .memory-li').attr("data-sub-html", pageURL);
		}
	//	$('#lightgallery').lightGallery();

		function loadURL(containerid, ajax_url){

				$(containerid).html("<div class='memory-loader'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><span >Loading...</span></div>");
				var jqxhr = $.get( ajax_url , function(data) {

					$(containerid).html(data);

				});

		}

		loadURL("#col-recommended_<?=$cat2?>","i_recommended.php");

		$("span").removeProp("style");
		$("font").removeProp("face");
		$("font").removeProp("size");
		$("font").removeProp("color");
		$("font").prop("class", "fontclass");



    });
    </script>
	
	<style>
		.lg-outer #lg-share {
			display: none;
		}

		.img-responsive {
			max-width: 45%;
			padding-right: 20px !important;
			cursor: pointer;
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
				width: 100%;
				height: 300px;	
			}
        }
	</style>

<script type="text/javascript">

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

	</script>

    <!-- Lazy loading Section -->
    <?php
    include "lazyload-cloudimg.php";
    ?>
