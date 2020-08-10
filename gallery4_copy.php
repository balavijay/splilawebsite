<?php



	define("SEO", "enabled");



		

	session_start();

		

	$_SESSION['start'] = true;

	//$_SESSION['session_id'] = "201995d0-7f48-11e7-892f-0242e32748bc-56";

	$_SESSION['SEO'] = SEO;



    include_once("common.php");
    
    $page_type = $_GET['q'];
    $page_type = "108_temples";

//////////////////////
    $darshan_url = "https://srilaprabhupadalila.com/v2/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:DARSHAN,web:1";
    $darshan_data  = file_get_contents($darshan_url);
    $darshan_data_json = json_decode($darshan_data);

    $indexName = "";
    $darshanArray = array();
    $newdata = array();

    $indexName = $darshan_data_json->resource[0]->temple_id;

    foreach($darshan_data_json->resource as $item){

        if($indexName != $item->temple_id){

            array_push($darshanArray, $newdata );
            unset($newdata); 
            $newdata = array();

            $indexName = $item->temple_id;
            array_push($newdata, $item->photo_url );
            
        }
        else{
            array_push($newdata, $item->photo_url );
        }
        
    }
    array_push($darshanArray, $newdata );




/////////////////////

    
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
   
    <meta name="apple-itunes-app" content="app-id=1211997347">

    <title>Srila Prabhupada Lila</title>
    <link rel="shortcut icon" href="https://sppbcdn.azureedge.net/images/favicon.ico" >
    

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Head includes Section -->
    <?php
    include "i_head_scripts.php";
    ?>	

    <!-- PRE LOADER -->

    <div class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </div>


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
                    <div  ><img src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/<?=$page_topImage?>" class="innerImg" /></div>
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




<?php
    include "mail_error.php";
?>  

<section id="about" class="parallax-section" style="display:<?=$dynamicSection?>">
        <div class="container">
        

            <!-- All temple Darshan -->
            <div  id="scrollableContainer"  >
            <a href="#" id="darshanAllTemple_toggle" class="darshan-btn section-btn btn btn-success">Darshan of All Temples</a>
                <div  id="scrollable" >   
                <img id="scroll-img"   />
                <?php
                    $counter = 0;
                    foreach($darshanArray as $temple)
                    {
                        foreach($temple as $img)
                        {   
                            $counter++;
                ?> 
                            <span id="item_<?=$counter?>" data-src="<?=$img?>" />
                <?php
                        }
                    }
                ?> 
                </div>                           

            <style>
                #scrollableContainer{
                    display: none;
                }
            </style>    
              
          
            </div>
            
            
            <?php 

                $display_photo = "";
                $display_content = "";
                $display_title = "";
                
                $counter = 0;

                foreach($datajson->resource as $item)
                {
                    $counter++;

                        $id             = $item->id;  

                        $display_photo  = $item->thumbnail_url;
        
                        $display_title  = $item->title;

                        $summary        = $item->summary;                                
            
                        $content_text   = $item->content_text;

                        $link = "https://maps.google.com/?q=$item->latitude,$item->longitude";

                        $imageIndex     = intval(substr($id,2));
                        $imageIndex--;
                        
                        

            ?> 
            
                <div class="list-group custom-list-group">
                <div id="<?=$id?>"  class="list-group-item gallery4">
                    <span class="span1"><a href="#" data-toggle="modal" data-target="#darshanModal_<?=$id?>"><img src="<?=$display_photo?>" alt="<?=$display_title?>"></a></span>
                    <span >
                        <h3 class="list-group-item-heading"><?=$counter?>. <?=$display_title?></h3>
                        <p class="list-group-item-text"><?=$summary?></p>
                        <br />
                        
                        <a href="#" data-toggle="modal" data-target="#darshanModal_<?=$id?>" class="darshan-btn section-btn btn btn-success"> Darshan</a>
                        <a href="#" data-toggle="modal" data-target="#templeModal_<?=$id?>" class="section-btn btn btn-success"><i class="fa fa-map-marker" aria-hidden="true"></i> Locate</a>
                    

                        
                    </span>
                </div>
                </div>


                <!--Locate Modal -->
                <div id="templeModal_<?=$id?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title"><?=$counter?>. <?=$display_title?></h3>
                        </div>
                        <div class="modal-body">
                            <p class="list-group-item-text"><?=$content_text?></p>
                            <br />
                            <a href="<?=$link?>" target="_blank" class="section-btn btn btn-success"><i class="fa fa-map-marker" aria-hidden="true"></i> Map</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
                </div>


                <!--Darshan Modal -->
                <div id="darshanModal_<?=$id?>" class="modal fade darshan-modal " role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title"><?=$counter?>. <?=$display_title?></h3>
                        </div>
                        <div class="modal-body">
                        <?php
                            foreach($darshanArray[$imageIndex] as $img)
                            {
                                $uri = str_replace("108_temples/hdpi", "108_temples/thumbnail", $img);
                        ?>
                                <img data-src="<?=$img?>" width="100%" /> 
                                <br /><br />
                        <?php                    
                            }
                        ?>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
                </div>

                                                    
        
            <?php 
    
                } // End of For-loop 1
            ?>


                <!--Darshan All temple Modal -->
                <div id="darshanAllTemple_modal" class="modal darshan-modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- the CSS for Smooth Div Scroll -->
                

                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Darshan of All Temples</h3>
                        </div>

                    </div>

                </div>

                            
                </div>


          </div>
     </div>
</section>


    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>

   <script>
        $( ".darshan-modal" ).on('shown.bs.modal', function (e) {
            
            $("#" + this.id + " img" ).each(function() {
                $(this).attr('src', $(this).attr('data-src') );
            });
        });
       
   </script>

</body>

</html>
