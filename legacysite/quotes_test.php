<?php



	session_start();

	define("SEO", "enabled");

	include_once("common.php");

	



	$menu = $_GET['q'];

	

	if($menu == "quotes_test")

	{

		$bannerTitle = "Quotes";

		$topImage = "quotes-prabhupada.png";

	

		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:QUOTE,resolution:xxxhdpi";

    }
    else if($menu == "srila-prabupada-rare-pictures_test")

	{

		$bannerTitle = "Rare Pictures";

		$topImage = "rare-picture-prabhupada.png";

	

		$url = "http://52.172.29.49/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:PHOTO,resolution:xxxhdpi";

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

					<div class="banner-txt"> Srila Prabhupada Lila </div>

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




<section>
	<link href='css/lightbox/simplelightbox.min.css' rel='stylesheet' type='text/css'>
	<link href='css/lightbox/demo.css' rel='stylesheet' type='text/css'>
</section>

	<div id="card_container" class="row">


<h1 >Srila Prabhupada's <?=$bannerTitle?></h1>


    <div class="container">
        <div class="gallery">
   
				

<?php



		

		$resource = $json->resource;

		
        $counter = 0;
        
		foreach($resource as $card)

		{
            $counter++;
            $displayLogic = $counter % 7;
			if(isset($card->photo_url))

				$imgurl = $card->photo_url;

			else 
				$imgurl = $card->thumbnail_url;
			

		

			if(isset($card->title))

				$title = $card->title;

			else 
				$title = null;



			

			if($title != null)

				$title_in_url = seo_friendly_string($title);

			

			$id = $card->id;



			$link = "/$menu/$id";

?>				

	



            <?php

                if($displayLogic == 1)

                {

            ?>

                    <a href="<?=$imgurl?>" class="big">
                    <img data-src="<?=$imgurl?>" class="img-responsive img-hover lazyload" />            
                    </a>
                    
                    

            <?php

                }
                else {

            ?>  

                    <a href="<?=$imgurl?>">
                    <img data-src="<?=$imgurl?>" class="img-responsive img-hover lazyload" />            
                    </a>
                    
                    
            
            <?php
                }
            ?>              
                      
												
                        

					

			

<?php

		}

?>
</div>
    </div>

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


<section>

<script type="text/javascript" src="js/lightbox/simple-lightbox.min.js"></script>
<script>
	$(function(){
		var $gallery = $('.gallery a').simpleLightbox();
	});
</script>
</section>
</body>



</html>

