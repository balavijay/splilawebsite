<?php



	session_start();





	include_once("common.php");

		$q = $_GET['q'];

		$paths = explode ("/",$q);

		if($paths == FALSE)
			die();


		$type_desc = $paths[1];
		$rid_str = $paths[2];
		$rid = $paths[3];

		

	
		if($type_desc == "memories-by-location")

		{

			$resource = "QUERY_BY_LOCATION";

			$param = "location_id";

			$page_title = "Srila Prabhupada memories in ";

			$type = "location";



		}

		else if($type_desc == "memories-by-devotee")

		{

			$resource = "QUERY_BY_DEVOTEE";

			$param = "devotee_id";

			$page_title = "Srila Prabhupada memories by devotee - ";

			$type = "devotee";

		}

		else if($type_desc == "memories-by-quality")

		{

			$resource = "QUERY_BY_QUALITY";

			$param = "quality_id";

			$type = "quality";

			$page_title = "Srila Prabhupada memories by quality - ";

		}

		else if($type_desc == "memories-by-topic")

		{

			$resource = "QUERY_BY_KEYWORD";

			$param = "keyword_id";

			$type = "topic";

			$page_title = "Srila Prabhupada memories by topic - ";

		}





	$banner_str = readable_string($rid_str);

	$type_readble = readable_string($type);

	// $snipets = get_memory_list($resource, $param, $rid, "S");

	// $vigneets = get_memory_list($resource, $param, $rid, "M");

	// $episodes = get_memory_list($resource, $param, $rid, "L");
	//$allcount = count($snipets) + count($vigneets) + count($episodes);

	$allmemory = get_memory_list($resource, $param, $rid, "all");
	$allcount = count($allmemory);
	



	$page_title = $page_title . $banner_str;



	function get_memory_list($resource, $param, $id, $size)

	{



		//$sid  = $_SESSION['session_id'];



		//$url = "https://52.172.29.49/api/content?queryId=$resource&args=$param:$id,size:$size,resolution:xxxhdpi&session_id=$sid";

		$url = "http://srilaprabhupadalila.com/v2/api/content?queryId=$resource&args=$param:$id,size:$size,resolution:xxxhdpi";
		

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


<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
	<li class="breadcrumb-item"><a href="/srila-prabhupada-memories">Memories</a></li>
	<li class="breadcrumb-item"><a href="javascript:load_memory_by('<?=$type?>')"><?=$type_readble?></a></li>
    <li class="breadcrumb-item active"> <?=$banner_str?></li>
</ol>






    <section class="g-100">

		<div class="container">


			<div class="row" id="sort-story">



<?php

				/* Dump Snippets first */

				if($allmemory != NULL && count($allmemory) != 0)

				foreach($allmemory as $m)

				{

					$title = trim($m->title);

					$desc = substr(strip_tags($m->content_text), 0, 200);

					$id = $m->id;

					$photo_url = $m->thumbnail_url;

					$title_in_url = seo_friendly_string($title);



					$link = "/$type/$rid_str/$title_in_url/$rid/$id";

					//$link = "../../../read/$type/$rid/$rid_str/$id/$title_in_url";

?>



			<div class="col-md-6 col-sm-6 Snippets">
                <div class="list-group custom-list-group set-box location-list">
				<div class="story-pic"></div>
                <a  onclick="javascript:load_memory_read_content('<?=$link?>');" class="list-group-item ">
                    <span><img class="card-img-top" src="<?=$photo_url?>" alt="<?=$title?>"></span>
                    <span><h4 class="list-group-item-heading" data-toggle="ellipsis" data-type="chars" data-count="60" ><?=$title?></h4>
                    <p class="list-group-item-text" data-toggle="ellipsis" data-type="chars" data-count="100" ><?=$desc?></p></span>
                </a>
                </div>
            </div>

<?php

				}

?>







			</div> <!-- End of row -->

		</div>

		<br /><br /><br />

	</section>




<script src="js/jquery.ellipsis.js"></script>


