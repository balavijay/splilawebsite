

<?php
    session_start();

    

    if(!isset($_SESSION['start']))

    {

        http_response_code(500);

        die();

    }



    include_once("common.php");

    $data_url = $_GET['data_url'];   
    
    $dynamicSection = "block";
	if($data_url){

		
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

<?php
    include "mail_error.php";
?>  



<section id="about" class="parallax-section" style="display:<?=$dynamicSection?>">
        <div class="container">

       
            
            <?php 

                $display_photo = "";
                $display_content = "";
                $display_title = "";
                $summary    = "";
                
                $counter = 0;

                foreach($datajson->resource as $item)
                {
                    $counter++;

                    if(isset($item->photo_url))
                        $display_photo = $item->photo_url;
                    else
                        $display_photo = $item->thumbnail_url;


                    $display_photo = str_replace("_thumb","", $display_photo);

                    // Till poetry folder has valid photos
                    $display_photo = str_replace("poetry","sanskrit_sloka", $display_photo);
                    
                    if($item->title)
                        $display_title = $item->title;

                        $content_text = $item->content_text;      
                        
                        $summary = "";
                        if($item->summary)
                        $summary = $item->summary;
            
                        $reference = $item->reference;

                        $cid = $item->id;

                        if($counter > 10){

                        if($counter%2 == 1)
                        {

            ?> 
            
                        
                            <!-- color1 Section -->
                            <div class="row m-pad-bottom">
                                <div class="col-md-6 col-sm-12">
                                    <div class="about-thumb">

                                        <?php
                                            if($display_title != null)
                                            {
                                        ?>

                                                <div class="wow  section-title" >
                                                    <h1><?=$display_title?></h1>
                                                    
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        
                                        <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="335">
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
                                    <div><a href="/read/<?=$cid?>" target="_blank" ><img class="gallery3-img" data-src-analogies="<?=$cid?>" ci-src="<?=$display_photo?>" height="" width="100%" /></a></div>
                                </div>
                            </div>
                            
                            <?php
                                } else {
                            ?>

                                <!-- color2 Section -->
                                <div class="row bg-yellow m-pad-top">
                                    <div class="col-md-6 col-sm-12">
                                        <div><a href="/read/<?=$cid?>" target="_blank" ><img class="gallery3-img" data-src-analogies="<?=$cid?>" ci-src="<?=$display_photo?>" height="" width="100%" /></a></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="about-thumb">

                                        <?php
                                            if($display_title != null)
                                            {
                                        ?>

                                                <div class="wow  section-title" >
                                                    <h1><?=$display_title?></h1>

                                                </div>
                                        <?php
                                            }
                                        ?>
                                            
                                            <div class="cr_more wow fadeInUp"  data-wow-delay="0.2s"  data-crheight="335">
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
                                }
                            }
                            ?>                                 
        
            <?php 
    
                } // End of For-loop 1
            ?>
        

          </div>
     </div>
</section>

    <script>
       $('.gallery3-img').error(function() {

           if("<?=$data_url?>" == "http://srilaprabhupadalila.com/v2/api/content?queryId=QUERY_GET_GENERIC_CONTENT&args=type:ANALOGIES,web:1"){

                var analogiesImg = $(this).attr("data-src-analogies");

                $(this).attr("src" , "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/analogies/xxxhdpi/" + analogiesImg +".png");

           }
           else {

                $(this).attr("src" , "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/analogies/xxxhdpi/AC300.png");
           }

            
        });
    </script>


<script src="https://sppbcdn.azureedge.net/files/js/continue-reading.js"></script>
           
                
     
    <!-- Lazy loading Section -->
    <?php
    include "lazyload-cloudimg.php";
    ?>
