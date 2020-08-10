<?php

	session_start();
	include_once("common.php");
	
	$_SESSION['session_id'] = "201995d0-7f48-11e7-892f-0242e32748bc-56";



	$page_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	if(isset($_GET['routed']))
	{
		$uri = $_SERVER['REDIRECT_URL'];
		$paths = explode ("/",$uri);

		$type = $paths[0];
		$rid = end($paths);
		
		if($type == "location" || $type == "devotee" || $type == "quality" || $type == "topic")
			$type = "Others";
		else
			$type = "Home";
		
		/*
		if(strstr($type, "day"))
			$type = "Home";
		else if($type == "interesting-facts" || $type == "first-publication-dates")
			$type = "Home";
		else if($type == "places-made-holy" || $type == "prabhupadas-travels")
			$type = "Home";
		else if($type
			$type = "Others";
		*/
		
		$cstr = get_home_card_type($rid);

	}else{
		
		die("");
	}
		
		
	$cat = null;

	
	$type_readble = readable_string($type);
	$type_seo 	  = seo_friendly_string($type);
	
	$show_error = false;
	
	$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_CONTENT&args=content_id:$rid,resolution:xxxhdpi";

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
	
	if($type == "Home")
	{
		if(isset($memory->reference) && $memory->reference != NULL)
		{
			$ref = $memory->reference;
			$reference_html ="<b>Reference:</b> <i>$ref</i><br>";

		}else if(isset($memory->summary) && $memory->summary != NULL){
			$ref = $memory->summary;
			$reference_html ="<b>Reference:</b> <i>$ref</i><br>";
		}
	}else{
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

	}
	
	$page_title = get_page_title($type, $rid, $title);

	$open_graph_desc = htmlspecialchars (substr(strip_tags($content), 0, 1000));
	$open_graph_title = htmlspecialchars($page_title);

	
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
	$url = "http://52.172.29.49/api/$resource?queryId=QUERY_ALL&args=dummy:dummy,resolution:xxxhdpi&session_id=$sid";
	
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

function get_page_title($type, $rid, $title)
{
	if($type == "Home")
	{
		$cat = substr($rid, 0, 3);
		if($cat == "SPT")
			return "Srila Prabhupada Today - $title";
		if($cat == "LSO")
			return "Srila Prabhupada Lila - Memory of the day";
		if($cat == "LST")
			return "Srila Prabhupada Lila - Anecdote of the day";
		
		
		$cat = substr($rid, 0, 2);
		if($cat == "RP")
			return "Srila Prabhupada Lila - Rare picture of the day";
		if($cat == "QU")
			return "Srila Prabhupada Lila - Quote of the day";
		if($cat == "DY")
			return "Srila Prabhupada Lila - $title";
		if($cat == "FV")
			return "Srila Prabhupada Lila - First Vists...";
		if($cat == "BR")
			return "Srila Prabhupada Lila - First Publication dates";
		if($cat == "TK")
			return "Srila Prabhupada Lila - Places made holy";
		if($cat == "NV")
			return "Srila Prabhupada Lila - Prabhupada's travels";
	}else{
		return "Srila Prabhupada Lila - $title";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$page_title?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style_v3.css" rel="stylesheet">
    <link href="/css/navi.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.png" >
    	<link href="/css/footer-v1-updated.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">

	<meta property="og:url" content="<?=$page_url?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?=$photo_url?>" />
	<meta property="og:title" content="<?=$open_graph_title?>" />
	<meta property="og:description" content="<?=$open_graph_desc?>" />
	
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
<body>
<?php
	include_once "menu_items.php";
?>

<?php
	if($type != "Home")
	{
		$cat1 = ucfirst($paths[0] . "s");
		$cat2 = ucfirst($paths[1]);
?>
		<div class="sticknav breadcrumb">
			<a class="" href="/">Home</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a class="" href="/srila-prabhupada-memories">Memories</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a class="" href="/memories-by-<?=$paths[0]?>s"><?=$cat1?></a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a class="active" href="/memories-by-<?=$paths[0]?>/<?=$paths[1]?>/<?=$paths[3]?>"><?=$cat2?></a>
			
		</div>
<?php
	}else
	{
?>
		<div class="sticknav breadcrumb">
			<a class="" href="/">Home</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<?=$cstr?>
		</div>
<?php
	}
?>
		
    <header>
        <div class="container">
        	<!--
            <div class="row">
                <div class="col-sm-6">
					<div class="banner-txt"><?=$page_title?><span>Srila Prabhupada Lila</span></div>
				</div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="images/prabhu-banner-2.png"></div>
            </div>
           -->
        </div>
    </header>

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
				<div class="col-md-4 img-portfolio">
					<div class="set-box location-list">					
						
						<a href="/<?=$type_seo?>/<?=$cid?>/<?=$seo_cat_title?>">	
							<img class="img-responsive img-hover" src="<?=$cat_photo?>" alt="">
						</a>
						<div class="list-txt">
							<a href="/<?=$type_seo?>/<?=$cid?>/<?=$seo_cat_title?>">	
								<h3><?=$cat_title?></h3>
								<p><?=$cat_summary?></p>
							</a>
							<span class="stag">Read <span class="total-art"><?=$cat_read?></span>/<span class="read-art"><?=$cat_total?></span></span>
						</div>
					</div>
				</div>
<?php
			}
?>				
				<div class="col-md-8 <?=$class_for_center_if_home?>  img-portfolio">
					<div class="article-box">
						<div class="art-img-box">
							<h1><?=$title?></h1>
							<img class="img-responsive" src="<?=$photo_url?>" alt="">
							<ul>
								<li><i class="fa fa-heart" aria-hidden="true"></i> <span><?=$fc?></span></li>
								<li><i class="fa fa-eye" aria-hidden="true"></i> <span><?=$rc?></span></li>
								<li><i class="fa fa-download" aria-hidden="true"></i> <span><?=$dc?></span></li>
								<li>
									<button type="button" id="btn-share" class="btn btn-simple popover-html" data-container="body" data-toggle="popover" data-placement="top">
										<i class="fa fa-share-alt" aria-hidden="true"></i>
									</button>
									<span><?=$sc?></span>
									<!-- Popover hidden content -->
									<span id="popoverExampleHiddenContent" class="hidden">
										<a target="_blank" href="#" class="btn-media twitter"><i class="fa fa-twitter"></i></a>
										<a target="_blank" href="#" class="btn-media facebook"><i class="fa fa-facebook"></i></a>
										<a target="_blank" href="#" class="btn-media google-plus"><i class="fa fa-google-plus"></i></a>
									</span>
								</li>
							</ul>
						</div>
						<div class="art-para">
							<?=$content?>
						</div>
						<div class="art-para">
							<?=$reference_html?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer>
<?php
	include_once "footer_links.php";
?>	
	</footer>


    <!-- Script -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script  src="/js/navi.js"></script>    
	<script>
	$("#btn-share").popover({
		  html : true, 
		  container : '#btn-share',
		  content: function() {
			return $('#popoverExampleHiddenContent').html();
		  },
		  template: '<div class="popover" role="tooltip"><div class="popover-content"></div></div>'
		});

		$(document).click(function (event) {
					// hide share button popover
				if (!$(event.target).closest('#btn-share').length) {
					$('#btn-share').popover('hide')
				}
			});

		$("a.twitter").attr("href", "#" + window.location.href);
		$("a.facebook").attr("href", "#" + window.location.href);
		$("a.google-plus").attr("href", "#" + window.location.href);
	</script>
	

</body>

</html>
