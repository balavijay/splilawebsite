<?php



	session_start();

	define("SEO", "enabled");

	include_once("common.php");

	



	$menu = $_GET['q'];

	

	if($menu == "quotes")

	{

		$bannerTitle = "Quotes";

		$topImage = "quotes-prabhupada.png";

	

		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:QUOTE,resolution:xxxhdpi";

	}

	else if($menu == "srila-prabupada-rare-pictures")

	{

		$bannerTitle = "Rare Pictures";

		$topImage = "rare-picture-prabhupada.png";

	

		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:PHOTO,resolution:xxxhdpi";

	}

	else if($menu == "quick-facts")

	{

		$bannerTitle = "Quick Facts";

		$topImage = "qf-prabhupada.png";

		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:DROP_OF_NECTOR,resolution:xxxhdpi";

	}

	else if($menu == "srila-prabhupada-illustrated-biography")

	{

		$bannerTitle = "Illustrated Biography";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_CONTENT_BY_TYPE&args=type:ILLUSTRATIONS,resolution:xxxhdpi";

	}

	else if($menu == "voyage-of-compassion")

	{

		$bannerTitle = "Voyage Of Compassion";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:VOYAGE_OF_COMPASSION,resolution:xxxhdpi";

	}

	else if($menu == "srila-prabhupada-analogies")

	{

		$bannerTitle = "Analogies";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_CONTENT_BY_TYPE&args=type:ANALOGIES,resolution:xxxhdpi";

	}	

	else if($menu == "eulogies-by-eminent")

	{

		$bannerTitle = "Eulogies By Eminent";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:EULOGIES,resolution:xxxhdpi";

	}	

	else if($menu == "predictions")

	{

		$bannerTitle = "Predictions";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_CONTENT_BY_TYPE&args=type:PREDICTIONS,resolution:xxxhdpi";

	}

	else if($menu == "poetry-by-prabhupada")

	{

		$bannerTitle = "Poetry By Prabhupada";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:POETRY_OF_PRABHUPADA,resolution:xxxhdpi";

	}

	else if($menu == "poetry-for-prabhupada")

	{

		$bannerTitle = "Poetry For Prabhupada";

		$topImage = "rare-picture-prabhupada.png";



		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_CONTENT_BY_TYPE&args=type:SANSKRIT_SLOKAS,resolution:xxxhdpi";

	}					

	else{

		header("Location: /");

		die();

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

    <title>Srila Prabhupada Lila</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/style_v3.css" rel="stylesheet">

    <link href="css/navi.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="/images/favicon.png" >

	<link href="/css/footer-v1-updated.css" rel="stylesheet">

	<link href="/css/responsive.css" rel="stylesheet">

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

			<a class="" href="/">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i>

			<a class="active" href="#"><?=$bannerTitle?></a>

		</div>

		

    <header>

        <div class="container">

            <div class="row">

                <div class="col-sm-6">

					<div class="banner-txt"><?=$bannerTitle?><span>Srila Prabhupada Lila</span></div>

				</div>

                <div class="col-sm-6"><img class="banner-pic img-responsive" src="images/<?=$topImage?>"></div>

            </div>

        </div>



        

    </header>



    <section class="g-100">

		<div class="container">

		

		

<?php

		$show_error = false;

		$day = date("d");

		$mon = date("m");

		

		

		$result  = file_get_contents($url);

		if($result === FALSE)

		{

			/* No content from server */

			$show_error = true;

		}else{

			$json = json_decode($result);

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

		$url = $uri;

		

		foreach($resource as $card)

		{

			if(isset($card->photo_url))

				$url = $card->photo_url;

			else 
				$url = $card->thumbnail_url;
			

		

			if(isset($card->title))

				$title = $card->title;

			else 
				$title = null;

			/*

			$dc = $card->download_count;

			$sc = $card->shares_count;

			$rc = $card->read_count;

			$fc = $card->favourite_count;

			 

			*/

			

			if($title != null)

				$title_in_url = seo_friendly_string($title);

			

			$id = $card->id;



			$link = "/$menu/$id";

?>				

				<div class="col-md-4 col-sm-6 img-portfolio">

					<div class="set-box">		

					

						<!--

							<a href="#" data-toggle="modal" data-target="#myModal">

						

							<a href="#" onclick="on();return false;">

								<img class="img-responsive img-hover" src="<?=$url?>" alt="">

							

							</a>

						-->

<?php

						if($title != null)

						{

?>						

							<h5><a href="<?=$link?>"><span class="card-title">&nbsp; <?=$title?></span></a></h5>

<?php

						}

?>

												

						<a class="homepic" href="<?=$link?>">

							<img data-src="<?=$url?>" class="img-responsive img-hover lazyload" />

						</a>

						<!--

						<ul>

							<li>likes<span><?=$fc?></span></li>

							<li>views<span><?=$rc?></span></li>

							<li>downloads<span><?=$dc?></span></li>

							<li>shares<span><?=$sc?></span></li>

						</ul>

						-->

					</div>

				</div>

			

<?php

		}

?>

	</div>







<?php

	}

?>				

			



		

		</div> <!-- End of Container -->

		

		

	</section>





	

  <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">

  	



    	



    	

    <div class="modal-dialog">

    

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header" style="padding:35px 50px;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>

        </div>

        <div class="modal-body" style="padding:40px 50px;">

          

            <div class="col-xs-2">

    			<div class="modal-arrow" id="left">



    			</div>

  			</div>

  			

  			  <div class="col-xs-10" id="right">

        </div>

        <div class="modal-footer">

          

      </div>

      

    </div>

  </div> 

 	

</div>

</div> 	

	

	

	<!-- ### Sign-in : Sign-up Popup ### -->

	<div class="modal fade" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel_1" aria-hidden="false">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<!--

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title" id="myModalLabel">Sign-In / Sign-Up</h4>

				</div>

				-->

				<div class="modal-body">

					

					

					

					

					

				</div>

			</div>

		</div>

	</div>

	<!-- Sign-in : Sign-up -->

		



	<!-- Footer -->

	<footer>

<?php

	include_once "footer_links.php";

?>	

	</footer>



    <!-- jQuery -->

    <script src="js/jquery.js"></script>

	<script src="js/lazysizes.min.js"></script>

	<script  src="/js/navi.js"></script>    

    <!-- Bootstrap Core JavaScript -->

    <script src="js/bootstrap.min.js"></script>





	<script type="text/javascript">

		$('#myModal').modal('hide');

		$('#right').find('*').css('margin-left', '0');

	

	function on() {

    	document.getElementById("overlay").style.display = "block";

	}



	function off() {

    	document.getElementById("overlay").style.display = "none";

	}	

	

	</script>



</body>



</html>

