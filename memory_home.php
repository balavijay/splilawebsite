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
    
    $page_type = $_GET['q'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Srila Prabhupada Lila</title>
    
    <meta property="og:url" content="http://www.srilaprabhupadalila.org/memory_home.php" />

    <meta property="og:type" content="article" />

    <meta property="og:image" content="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/ic_sp_lila_2.jpg" />

    <meta property="og:title" content="Srila Prabhupada Lila" />

    <meta property="og:description" content="Srila Prabhupada Memories. The verdict of all revealed scriptures is that by even a moment's association with a pure devotee, one can attain all success. (CC Madhya 22.54)." />
   
    <meta name="apple-itunes-app" content="app-id=1211997347">
    <meta name="google-site-verification" content="onSh7fXq9QjtvocKY6mCJdObgziOAzjvevS7n4t-Woo" />

    <?php
    include "i_head_scripts.php";
    ?>    
    

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- Styles and Head includes -->
    <?php
    include "i_styles.php";
    ?>
	
    <link rel="stylesheet" href="https://sppbcdn.azureedge.net/files/css/memory.css">


    <!-- PRE LOADER -->

   


    <!-- Navigation Section -->

    <?php
    include "i_menu_items.php";
    ?>	

    

<?php

$show_error = false;

$day = date("d");

$mon = date("m");



$date_str = date("F") . "-" . $day;


$metadata_url = "data/pagedescription.JSON";


$metadata  = file_get_contents($metadata_url);


if($metadata === FALSE)

{

    /* No content from server */

    $show_error = true;

}else{

    $metadatajson = json_decode($metadata);
   

    if($metadatajson == NULL)

        $show_error = true;

    else if( $metadatajson->errCode != 0)

        $show_error = true;


}

?>		


 <?php
    // $page_type = "srila-prabupada-rare-pictures";
    $page_topImage = "";
    foreach($metadatajson->resource as $item){
        if($item->content_type && $item->content_type == $page_type)
        {
             $page_title = $item->title;
             $page_content_text  = $item->content_text;
             $page_content_url  = $item->content_url;
             
           
             if($item->topImage)
                $page_topImage =   $item->topImage;
            else 
                $page_topImage = "ic_sp_1.jpg";

        }
	}
	
	$dynamicSection = "block";
	if($page_content_url){

		$data_url = $page_content_url;
		$data  = file_get_contents($data_url);
		$dynamicSection = "block";

		if($data === FALSE)

		{

			/* No content from server */

			$show_error = true;

		}else{

			$datajson = json_decode($data);
		

			if($datajson == NULL)

				$show_error = true;

			else if( $datajson->errCode != 0)

				$show_error = true;


		}

		} // if $page_content_url is not blank
		else {
			$dynamicSection = "none";
		}


?>


    <!-- Main Section -->

    <section id="inner" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-sm-2">
                    <div class="inner-thumb-img" ><img src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/<?=$page_topImage?>" class="innerImg" /></div>
                </div>

                <div class="col-md-9 col-sm-9">
                    <div class="inner-thumb">
                        <div class="section-title">
                             
                            <h1 class="wow fadeInUp" data-wow-delay="0.6s"> <?=$page_title?> </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.9s"> <?=$page_content_text?>  </p>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>



<div id="memory-title" class="memory-title"><h1> Memories by </h1></div>
<ul class="nav nav-tabs" role="tablist">
    <li id="location" data-tabname="location_tab" class="active" ><a >Location</a></li>
    <li id="devotees" data-tabname="devotees_tab"><a   >Devotees</a></li>
    <li id="qualities" data-tabname="qualities_tab"><a   >Qualities</a></li>
    <li id="topics" data-tabname="topics_tab"><a   >Topics</a></li>        
  </ul>

  

  

<div class="tabpanel">

	<div class="csspanes" id="location_tab">

        <div id="memories-by-location_home">
        <div class="container">
            <div id="memories-by-locations_data" class="row">
            
            </div>
        </div>
        </div>

        <div id="memories-by-location_inner"></div>
        <div id="memories-by-location_read"></div>
    </div>
    

	<div class="csspanes" id="devotees_tab">

        <div id="memories-by-devotee_home">
        <div class="container">
            <div id="memories-by-devotees_data" class="row">
            
            </div>
        </div>
        </div>

        <div id="memories-by-devotee_inner"></div>
        <div id="memories-by-devotee_read"></div>
    </div>
    

	<div class="csspanes" id="qualities_tab">

        <div id="memories-by-quality_home">
        <div class="container">
            <div id="memories-by-qualities_data" class="row">
            
            </div>
        </div>
        </div>

        <div id="memories-by-quality_inner"></div>
        <div id="memories-by-quality_read"></div>
    </div>
    

	<div class="csspanes" id="topics_tab">

        <div id="memories-by-topic_home">
        <div class="container">
            <div id="memories-by-topics_data" class="row">
            
            </div>
        </div>
        </div>

        <div id="memories-by-topic_inner"></div>
        <div id="memories-by-topic_read"></div> 
	</div>

	
</div>

<br /><br />

    


      
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>




    <script src="https://sppbcdn.azureedge.net/files/js/memory.js"></script>
    <script src="https://sppbcdn.azureedge.net/files/js/jquery.ellipsis.js"></script>

    <script>

    $(document).ready(function(){
        
        loadMemoryBy("memories-by-locations");
        loadMemoryBy("memories-by-devotees");
        loadMemoryBy("memories-by-qualities");
        loadMemoryBy("memories-by-topics");

    });

    function loadMemoryBy (memory_by) {
        console.log("#"+ memory_by +"_data");
        $("#"+ memory_by +"_data").html("Loading..");

        var jqxhr = $.get( "memory_by.php?q=" + memory_by, function(data) {
            
            $("#" + memory_by + "_data").html(data);

        });

    } 
    
    </script>

<style>
    .nav-tabs {
        background-color: #369;
        padding: 10px 10px 0px 10px;
    }
    .nav-tabs>li {
        font-weight: bold;
        cursor:pointer;
    }
    .nav-tabs>li>a {
        color: #fff;
        padding: 10px;
    }
    .nav-tabs>li>a:hover {
        color: #e9724c;
    }
</style>		

</body>

</html>
