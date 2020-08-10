
<?php
    session_start();

    

    if(!isset($_SESSION['start']))

    {

        http_response_code(500);

        die();

    }



    if(!isset($_GET['q']))

    {

        http_response_code(500);

        die();		

    }	

    include_once("common.php");

    $q = $_GET['q'];


    $seo_cat = "";

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
 
         
         
         $validcounter = 0;
         foreach($resource as $card)
 
         {
            
             if( $card->count > 0 ){
                // Load valid 11th records onwards
                $validcounter++;
                if($validcounter > 10){

                
                
                    $id = $card->id;    
                    $name = $card->name;

                    if(isset($card->summary))
                        $summary = $card->summary;
                    else
                        $summary = "";
                        
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
                            $image_url_meta = "images/dasi.png";
                        else
                            $image_url_meta = "images/dasa.png";
                    
                    }

?>
             <div class="col-md-6 col-sm-6">
                <div class="list-group custom-list-group">
                <a onclick="javascript:load_listing('<?=$link?>');" class="list-group-item ">
                    <span><img class="card-img-top" src="<?=$image_url?>"  data-img-src="<?=$image_url_meta?>"  ></span>
                    <span><h4 class="list-group-item-heading" data-toggle="ellipsis" data-type="chars" data-count="60"><?=$name?></h4>
                    <p class="list-group-item-text" data-toggle="ellipsis" data-type="lines" data-count="2"><?=$summary?></p></span>
                </a>
                </div>
            </div>
                
<?php
            }
        }
			
		}
?>


<?php
    include "mail_error.php";
?>  

   <script>
	  
      $('#memories-by-devotee_home .card-img-top').error(function() {
          $(this).attr("src" , $(this).attr("data-img-src") );
      }); 
        
  
      </script>


<script src="https://sppbcdn.azureedge.net/files/js/memory.js"></script>
<script src="https://sppbcdn.azureedge.net/files/js/jquery.ellipsis.js"></script>
