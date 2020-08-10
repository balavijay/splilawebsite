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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="apple-itunes-app" content="app-id=1211997347">
    
    <title>Srila Prabhupada Lila</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.png" >
    
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
	<header>
		
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

    	<div class="navbar-header">
	 		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	      	<a class="navbar-brand logo" href="/">Srila Prabhupada Lila</a>
	 	</div>

		<div class="collapse navbar-collapse" id="myNavbar">
		    <ul class="nav navbar-nav navbar-right">
		      <li class="active"><a href="/"><span class=""></span> Home</a></li>
		      <li><a href="/srila-prabhupada-memories"><span class=""></span> Memories</a></li>
		      <li><a href="/acknowledge"><span class=""></span> Acknowledgements</a></li>
		      <li><a href="/share-with-us"><span class=""></span> Share With Us</a></li>
		    </ul>
		</div>
  </div>
</nav>		



		<!--
		<div class="sticknav">
			<a class="navbar-brand logo" href="/">Srila Prabhupada Lila</a>

		</div>
		-->
<?php
	//include_once("menu.php");
?>	
	
		
	</header>	
	
<?php
	include_once "app_bar.php";
?>    	
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
					<div class="banner-txt">Welcome to<span>Srila Prabhupada Lila</span></div>
				</div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="images/home-prabhupada.png"></div>
            </div>
        </div>
    </header>

    <section class="g-100">
		<div class="container" id="card_container_main" >
		
		
<?php
		$show_error = false;
		$day = date("d");
		$mon = date("m");
		
		$today_url = "http://srilaprabhupadalila.com/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:$day,month:$mon&resolution=xxxhdpi";
		$today  = file_get_contents($today_url);
		if($today === FALSE)
		{
			/* No content from server */
			$show_error = true;
		}else{
			$json = json_decode($today);
			if($json == NULL)
				$show_error = true;
			else if( $json->errCode != 0)
				$show_error = true;
		}
?>		
		
<?php
	if($show_error)
	{
?>		
		
	<div class="row">
				<div class="col-lg-12">
				<p class="red">There is a problem in loading the memories. Please visit again</p>
				</div>
	</div>
<?php
	}else{
?>


	<div id="card_container" class="row">
				
<?php

		
		$resource = $json->resource;
		
		foreach($resource as $card)
		{
			$url = $card->photo_url;
			$title = $card->title;
			$dc = $card->download_count;
			$sc = $card->shares_count;
			$rc = $card->read_count;
			$fc = $card->favourite_count;
			$id = $card->reference_id;
			$title_in_url = seo_friendly_string($title);
			
			//http://sp.com/splila/Memroy-Read/SPT229/Home/Srila-Prabhupada-Today---August-16
			
			if(SEO == "enabled")
				$link = "Memroy-Read/Home/$id/$title_in_url";
			else
				$link = "memory_read.php?type=Home&id=$id";
?>				
				<div class="col-md-4 col-sm-6 img-portfolio">
					<div class="set-box">					
						<h5><a href="<?=$link?>"><span class="card-title">&nbsp; <?=$title?></span></a></h5>
						<a href="<?=$link?>">
							<img class="img-responsive img-hover" src="<?=$url?>" alt="">
						</a>
						<ul>
							<li>likes<span><?=$fc?></span></li>
							<li>views<span><?=$rc?></span></li>
							<li>downloads<span><?=$dc?></span></li>
							<li>shares<span><?=$sc?></span></li>
						</ul>
					</div>
				</div>
			
<?php
		}
?>
	</div>

	
<div class="" style="text-align: center;" id="load_more_block">
	<div class="loadMore"> 
		<a href="#" onclick="return loadCards()">Load more cards</a>
	</div>
</div>
	
	<div class="row">
		<div class="explore-but"><a href="<?=$mlink?>">Explore More Memories</a></div>
	</div>

<?php
	}
?>				
			

		
		</div> <!-- End of Container -->
		
		
	</section>



				
	<!-- Footer -->
	<footer>
		
<?php
	include_once 'appstore_links.php';
?>		
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; 2017, Srila Prabhupada Lila. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<script>
	$(document).ready(function(){
			   
/*
		$(window).scroll(function() {
   			if($(window).scrollTop() + $(window).height() == $(document).height()) {
       			loadCards();
   			}
   		
		});
*/		
	});
	
	function loadCards()
	{
		if(inProgress == true)
			return false;
		
		inProgress = true;
		
		var jqxhr = $.get( "ajax.php?f=cards&day=" + past, function(data) {
  			
  			// $("div#card_container_main").append(data);
		
			$(data).insertBefore("#load_more_block");
  			past += 1;
		});
  
 
		jqxhr.always(function() {
  			inProgress = false;
		});

		return false;
	}
	
	var past = 1;
	var inProgress;
	
</script>

<script>
<!-- collpase menu if opened -->
$(document).on('click',function(){
$('.collapse').collapse('hide');
})
</script> 


</body>

</html>
