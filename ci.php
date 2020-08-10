
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<?php



	session_start();

	

	if(!isset($_SESSION['start']))

	{

		http_response_code(500);

		die();

	}

	


	

	include_once("common.php");

	

	$function = "cards&day=0&date=30&month=6";

	


		send_cards();







function send_cards()

{

		$seo = $_SESSION['SEO'];
		
			
		

		
		$date_str = date("F") . "-" . $day;
		$cards_url = "http://srilaprabhupadalila.com/v2/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:30,month:6,strips:1,web:1&resolution=xxxhdpi";


		
		$cards  = file_get_contents($cards_url);

		if($cards === FALSE)

		{

			http_response_code(500);

			die();

			

		}else{

			$json = json_decode($cards);

			if($json == NULL)

			{

				http_response_code(500);

				die();

			}

			else if( $json->errCode != 0)

			{

				http_response_code(500);

				die();

			}else{

				/* Success */

				
				echo "<section id='about'  class='parallax-section'>";

				echo "<div class='container'>";

				
				$resource = $json->resource;
				$counter = 0;
				foreach($resource as $item)
		
				{
					error_log("AJAX:$counter" . $item->card->title);
					if(isset($item->card) && isset($item->card->content_type) && $item->card->content_type != "QUOTE" && 
						$item->card->content_type != NULL && 
						$item->card->title != "Initiation ceremony" && 
						(is_numeric($item->card->content_id) != 1 || isset($item->card->Recent) ))
					{

				
					$counter++;
					
		
					$photo_url = $item->card->photo_url;
		
					$title = $item->card->title;
		
					$content_text = $item->card->content_text;

					
		
					$id = $item->card->reference_id;
		
					$reference = $item->card->reference;
		
					$title_in_url = seo_friendly_string($title);
		
					$dyn_link_type = get_home_card_type($id);
		
					$dyn_link_type_seo = seo_friendly_string($dyn_link_type);
		
					
		
		
		
					$date_str = seo_friendly_string($date_str);
		
					if(strstr($id, "SPT"))
		
						$link = "$dyn_link_type_seo/$date_str/$id";
		
					else
		
						$link = "$dyn_link_type_seo/$id";


						if($counter%2 == 1)
						{

					

?>
            <!-- color1 Section -->
            <div class="row m-pad-bottom">
                <div class="col-md-6 col-sm-12">
                    <div class="about-thumb">
                        <div class="wow  section-title" >
                            <h1><?=$title?></h1>
                            <!--p class="color-yellow">Sed vulputate vitae diam quis bibendum</p-->
                        </div>
                        <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="330">
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
                        <a class="cr_showhide wow fadeInUp smoothScroll section-btn btn btn-success" data-wow-delay="0.2s"></a>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div><a href="/<?=$id?>" target="_blank"><img src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/<?=$photo_url?>" height="" width="100%" /></a></div>
                </div>
            </div>
        <?php
            } else {
        ?>

            <!-- color2 Section -->
            <div class="row bg-yellow m-pad-top">
                <div class="col-md-6 col-sm-12">
                    <div><a href="/<?=$id?>" target="_blank"><img ci-src="<?=$photo_url?>" height="" width="100%" /></a> <?=$photo_url?> </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="about-thumb">
                        <div class="wow  section-title">
                            <h1><?=$title?></h1>
                        </div>
                        <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="330">
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
                        <a class="cr_showhide wow fadeInUp smoothScroll section-btn btn btn-success" data-wow-delay="0.2s"></a>
                    </div>
                </div>
            </div>
				

<?php					

				
						} //End of If
					}
				} //End of For Loop

				

				echo "</div>";
				echo "</section>";

			}

	

		}	

}

?>


<!-- Scripts -->
<!-- Add lazyload library -->
<script>
      window.lazySizesConfig = window.lazySizesConfig || {};
      window.lazySizesConfig.init = false;
    </script>
    <script src="https://cdn.scaleflex.it/filerobot/js-cloudimage-responsive/lazysizes.min.js"></script>

    <!-- Add js-cloudimage-responsiv library -->
    <script src="https://cdn.scaleflex.it/filerobot/js-cloudimage-responsive/v1.1.0.min.js"></script>

    <!-- Initialize cloudimage responsive -->
    <script>
      var cloudimgResponsive = new window.CIResponsive({
        token: "anvfnzuaen",
        baseUrl: "",
        lazyLoading: true
      });
      window.lazySizes.init();
    </script>