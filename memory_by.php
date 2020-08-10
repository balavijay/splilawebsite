
<?php		
	
		include_once("common.php");

		$seo_cat = "";

		$q = $_GET['q'];

		if($q == "memories-by-locations")

		{

			$resource_type = "location";

			$type = "Locations";

			$seo_cat = "memories-by-location";

			$page_title = "Srila Prabhupada Lila - Memories from all locations";

		}

		else if($q == "memories-by-devotees")

		{

			$resource_type = "devotee";

			$type = "Devotees";

			$seo_cat = "memories-by-devotee";

			$page_title = "Srila Prabhupada Lila - Memories by devotees";

		}

		else if($q == "memories-by-qualities")

		{

			$resource_type = "quality";

			$type = "Qualities";

			$seo_cat = "memories-by-quality";

			$page_title = "Srila Prabhupada Lila - Memories by quality";

		}

		else if($q == "memories-by-topics")

		{

			$resource_type = "keyword";

			$type = "Topics";

			$seo_cat = "memories-by-topic";

			$page_title = "Srila Prabhupada Lila - Memories by topics";

		}


		$url = "http://srilaprabhupadalila.com/v2/api/$resource_type?queryId=QUERY_ALL&args=dummy:dummy,resolution:xxxhdpi";

	

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
	
		}	


		$resource = $json->resource->list;

		
		$counter = 0;
		foreach($resource as $card)

		{
			// Load 1st 10 valid records
			if($counter <  10  ){
				if($card->count > 0) {

				
				$counter++;
				$id = $card->id;    
				$name = $card->name;
				$summary = $card->summary;
				$image_url_meta = "";
				
				$seo_name = seo_friendly_string($name);
				$seo_type = seo_friendly_string($seo_cat);
				$link = "/$seo_type/$seo_name/$id";
				
				if($card->image_url) {
					$image_url = str_replace("xxxhdpi","hdpi",$card->image_url);
				}

				if($seo_type == "memories-by-devotee"){

					$name_array = explode (" ",$name);
					$name_end = end($name_array);

					$image_url_meta = $image_url;

					if($name_end == "Dasi" || $name_end == "dasi")
						$image_url_meta = "https://anvfnzuaen.cloudimg.io/cdn/n/n/https://sppb.blob.core.windows.net/images/dasi.png";
					else
						$image_url_meta = "https://anvfnzuaen.cloudimg.io/cdn/n/n/https://sppb.blob.core.windows.net/images/dasa.png";
				
				}
            
            
?>
			<div class="col-md-6 col-sm-6">
				<div class="list-group custom-list-group">
				<a  onclick="javascript:load_listing('<?=$link?>');"  class="list-group-item ">
					<span><img class="card-img-top" src="<?=$image_url?>"  data-img-src="<?=$image_url_meta?>" ></span>
					<span><h4 class="list-group-item-heading" data-toggle="ellipsis" data-type="chars" data-count="60"><?=$name?></h4>
					<p class="list-group-item-text" data-toggle="ellipsis" data-type="chars" data-count="60"><?=$summary?></p></span>
				</a>
				</div>
			</div>
                
                
<?php
			}
		}
			else{
				
				break;
			}
		}
?>


   <script>
	  
	$('#memories-by-devotee_home .card-img-top').error(function() {
		$(this).attr("src" , $(this).attr("data-img-src") );
    }); 
	  

    </script>

	<style>
		.list-group-item-text {
			font-size: 16px;
		}
	</style>

<!-- Auto Card Loader Section -->
<?php
	include "i_memories_loader.php";
?>
<?php
    include "mail_error.php";
?>  
	
