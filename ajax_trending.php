<?php



	session_start();

	

	if(!isset($_SESSION['start']))

	{

		http_response_code(500);

		echo "500 Error";	

	}

	



	

	include_once("common.php");

	
    send_cards();











function send_cards()

{


		$cards_url = "http://srilaprabhupadalila.com/v2/api/ga?queryId=QUERY_TRENDING&args=resolution:xxxhdpi,web:1";
		
		$cards  = file_get_contents($cards_url);

		if($cards === FALSE)

		{

			http_response_code(500);

			echo "500 Error";

			

		}else{

			$json = json_decode($cards);

			if($json == NULL)

			{

				http_response_code(500);

				echo "500 Error";

			}

			else if( $json->errCode != 0)

			{

				http_response_code(500);

				echo "Error Code: " . $json->errCode .  "  " . $json->message;

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

					$video_url = $item->card->video_url;
					$video_path = explode ("/",$video_url);
		
					$id = $item->card->content_id;
		
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
                    <div>
						<?php
									
							if($video_path[3]){
								
						?>
								<a id="thumbnail_click_<?=$counter?>" onclick="javascript:thumbnail_click('<?=$video_path[3]?>', '<?=$counter?>')">
					
									<img data-href="/read/<?=$id?>" id="vimg_<?=$counter?>" class="img-responsive"  ci-src="<?=$photo_url?>?mark_url=https://sppb.blob.core.windows.net/images/click-to-play.png&mark_width=450&mark_pos=center" height="" width="100%" />
								
								</a>
						<?php
							} else {
								
						?>
									<a href="/<?=$id?>" target="_blank"><img ci-src="<?=$photo_url?>" height="" width="100%" /></a>
						<?php
							}
						?>					
					</div>
                </div>
            </div>
        <?php
            } else {
        ?>

            <!-- color2 Section -->
            <div class="row bg-yellow m-pad-top">
                <div class="col-md-6 col-sm-12">
                    <div>
						<?php
										
							if($video_path[3]){
								
						?>
								<a id="thumbnail_click_<?=$counter?>" onclick="javascript:thumbnail_click('<?=$video_path[3]?>', '<?=$counter?>')">
					
									<img data-href="/read/<?=$id?>" id="vimg_<?=$counter?>" class="img-responsive"  ci-src="<?=$photo_url?>?mark_url=https://sppb.blob.core.windows.net/images/click-to-play.png&mark_width=450&mark_pos=center" height="" width="100%" />
								
								</a>
						<?php
							} else {
								
						?>
									<a href="/<?=$id?>" target="_blank"><img ci-src="<?=$photo_url?>" height="" width="100%" /></a>
						<?php
							}
						?>
					</div>
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

<script src="https://sppbcdn.azureedge.net/files/js/continue-reading.js"></script>

		
		<?php
		include "i_video.php";
		?>


	    <!-- Lazy loading Section -->
		<?php
		include "lazyload-cloudimg.php";
		?>
