<?php

	session_start();
	
	if(!isset($_SESSION['start']))
	{
		http_response_code(500);
		die();
	}
	
	if(!isset($_GET['f']))
	{
		http_response_code(500);
		die();		
	}	
	
	include_once("common.php");
	
	$function = $_GET['f'];
	
	if($function == "cards")
	{

		send_cards();
				
	}




function send_cards()
{
		$seo = $_SESSION['SEO'];
		$objDateTime = new DateTime('NOW');
	
		if(isset($_GET['day']))
		{
			$pastDay = $_GET['day'];
			
			$objDateTime->sub(date_interval_create_from_date_string("$pastDay day"));
		}
	
		$day = $objDateTime->format('d');
		$mon = $objDateTime->format('m');
		$date_str = date("F") . "-" . $day;
		
		$cards_url = "http://52.172.29.49/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:$day,month:$mon&resolution=xxxhdpi";
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
				echo "<div class=\"h-divider\"></div>";
				
				echo "<div class=\"row\">";
				
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
			
			
					$dyn_link_type = get_home_card_type($id);
					$dyn_link_type_seo = seo_friendly_string($dyn_link_type);
								
					$date_str = seo_friendly_string($date_str);
					if(strstr($id, "SPT"))
						$link = "$dyn_link_type_seo/$date_str/$id";
					else
						$link = "$dyn_link_type_seo/$id";
					
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
				
				echo "</div>";
			}
	
		}	
}
?>