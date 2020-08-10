<?php

	session_start();
	

	include_once("common.php");
	
	if(isset($_GET['routed']))
	{
		$q = $_GET['q'];
		
		
		$paths = explode ("/",$q);
	
		if($paths == FALSE)
			die();
	
		
		$type = $paths[0];

	
		$rid = $paths[2];
		$rid_str = $paths[1];		
	}else{
		$type = $_GET['type'];
		$rid = $_GET['id'];
		$rid_str = $_GET['name'];
	}
	

		if($type == "memories-by-location")
		{
			$resource = "QUERY_BY_LOCATION";
			$param = "location_id";
			$page_title = "Srila Prabhupada memories in ";
			$type = "location";
			
		}
		else if($type == "memories-by-devotee")
		{
			$resource = "QUERY_BY_DEVOTEE";
			$param = "devotee_id";
			$page_title = "Srila Prabhupada memories by devotee - ";
			$type = "devotee";
		}
		else if($type == "memories-by-quality")
		{
			$resource = "QUERY_BY_QUALITY";
			$param = "quality_id";
			$type = "quality";
			$page_title = "Srila Prabhupada memories by quality - ";
		}
		else if($type == "memories-by-topic")
		{
			$resource = "QUERY_BY_KEYWORD";
			$param = "keyword_id";
			$type = "topic";
			$page_title = "Srila Prabhupada memories by topic - ";
		}	

	
	$banner_str = readable_string($rid_str);
	$type_readble = readable_string($type);
	$snipets = get_memory_list($resource, $param, $rid, "S");
	$vigneets = get_memory_list($resource, $param, $rid, "M");
	$episodes = get_memory_list($resource, $param, $rid, "L");
	
	$page_title = $page_title . $banner_str;
	
	function get_memory_list($resource, $param, $id, $size)
	{
		
		//$sid  = $_SESSION['session_id'];
		
		//$url = "http://52.172.29.49/api/content?queryId=$resource&args=$param:$id,size:$size,resolution:xxxhdpi&session_id=$sid";
		$url = "http://52.172.29.49/api/content?queryId=$resource&args=$param:$id,size:$size,resolution:xxxhdpi";
		$data  = file_get_contents($url);
		
		if($data == FALSE)
			return NULL;
		
		$json = json_decode($data);
		if($json == NULL)
			return NULL;
		else if( $json->errCode != 0)
			return NULL;
		
		if(!isset($json->resource))
			return NULL;

		return $json->resource;
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
		<div class="sticknav breadcrumb">
			<a class="" href="/">Home</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a href="/srila-prabhupada-memories">Memories</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a href="/memories-by-<?=$type?>"><?=$type_readble?></a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a class="active" href="/<?=$type?>/<?=$rid?>/<?=$rid_str?>"><?=$banner_str?></a>
		</div>	
    <header>
        <div class="container">
            <div class="row">
            	<div class="banner-txt"><?=$banner_str?><span>Srila Prabhupada Lila</span></div>
            	<!--
            	<div class="col-sm-6"><div class="banner-txt"><?=$rid_str?><span>Srila Prabhupada Lila</span></div></div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="/images/location-prabhupada.png"></div>
               -->
            </div>
        </div>
    </header>

    <section class="g-100">
		<div class="container">
			<div class="row">	
				<div class="sortable-tab">
					<button class="btn fil-cat" href="" data-rel="Snippets">Snippets</button>
					<button class="btn fil-cat" href="" data-rel="Vignettes">Vignettes</button>
					<button class="btn fil-cat" href="" data-rel="Episodes">Episodes</button>
				</div>
			</div>
			<div class="row" id="sort-story">
		
<?php
				/* Dump Snippets first */
				if($snipets != NULL && count($snipets) != 0)
				foreach($snipets as $m)
				{
					$title = trim($m->title);
					$desc = substr(strip_tags($m->content_text), 0, 200);
					$id = $m->id;
					$photo_url = $m->thumbnail_url;		
					$title_in_url = seo_friendly_string($title);
					
					$link = "/$type/$rid_str/$title_in_url/$rid/$id";
					//$link = "../../../read/$type/$rid/$rid_str/$id/$title_in_url";
?>

				<div class="col-md-3 col-sm-6 img-portfolio Snippets">
					<div class="set-box location-list">
						<div class="story-pic">
							<a class="homepic square" href="<?=$link?>">
							<img data-src="<?=$photo_url?>" class="img-responsive img-hover lazyload" />
							</a>
							<!--
							<div class="read-story"><a href="<?=$link?>">Read</a></div>
							-->
						</div>
						<div class="list-txt story-txt">
							<a href="<?=$link?>">
								<h3><?=$title?></h3>
								<p><?=$desc?></p>
							</a>
						</div>						
					</div>
				</div>
<?php					
				}
?>



<?php
				/* Dump Vignnets next*/
				if($vigneets != NULL && count($vigneets) != 0)
				foreach($vigneets as $m)
				{
					$title = trim($m->title);
					$desc = substr(strip_tags($m->content_text), 0, 200);
					$id = $m->id;
					$photo_url = $m->thumbnail_url;
					$title_in_url = seo_friendly_string($title);
					
					//$link = "../../../read/$type/$rid/$rid_str/$id/$title_in_url";
					$link = "/$type/$rid_str/$title_in_url/$rid/$id";
						
?>

				<div class="col-md-3 col-sm-6 img-portfolio Vignettes">
					<div class="set-box location-list">
						<div class="story-pic">
							<a class="homepic" href="<?=$link?>">
							<img data-src="<?=$photo_url?>" class="img-responsive img-hover lazyload" />
							</a>
							<!--
							<div class="read-story"><a href="<?=$link?>">Read</a></div>
							-->
						</div>
						<div class="list-txt story-txt">
							<a href="<?=$link?>">
								<h3><?=$title?></h3>
								<p><?=$desc?></p>
							</a>
						</div>						
					</div>
				</div>
<?php					
				}
?>
			
			
<?php
				/* Dump Episodes last*/
				if($episodes != NULL && count($episodes) != 0)
				foreach($episodes as $m)
				{
					$title = trim($m->title);
					$desc = substr(strip_tags($m->content_text), 0, 200);
					$id = $m->id;
					$photo_url = $m->thumbnail_url;	
					$title_in_url = seo_friendly_string($title);
					
					//$link = "../../../read/$type/$rid/$rid_str/$id/$title_in_url";
					$link = "/$type/$rid_str/$title_in_url/$rid/$id";

?>

				<div class="col-md-3 col-sm-6 img-portfolio Episodes">
					<div class="set-box location-list">
						<div class="story-pic">
							<a class="homepic" href="<?=$link?>">
							<img data-src="<?=$photo_url?>" class="img-responsive img-hover lazyload" />
							</a>
							<!--
							<div class="read-story"><a href="<?=$link?>">Read</a></div>
							-->
						</div>
						<div class="list-txt story-txt">
							<a href="<?=$link?>">
								<h3><?=$title?></h3>
								<p><?=$desc?></p>
							</a>
						</div>						
					</div>
				</div>
<?php					
				}
?>			
			</div> <!-- End of row -->
		</div>
	</section>

	
	<!-- Footer -->
	<footer>
<?php
	include_once "footer_links.php";
?>	
	</footer>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
	<script src="/js/lazysizes.min.js"></script>
	<script  src="/js/navi.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
	<script>
		$(function() {
				var selectedClass = "";
				$(".fil-cat").click(function(){ 
				selectedClass = $(this).attr("data-rel"); 
			 $("#sort-story").fadeTo(100, 0.1);
				$("#sort-story div.img-portfolio").not("."+selectedClass).fadeOut().removeClass('scale-anm');
			setTimeout(function() {
			  $("."+selectedClass).fadeIn().addClass('scale-anm');
			  $("#sort-story").fadeTo(300, 1);
			}, 300); 
				
			});
		});
	</script>

 
</body>

</html>
