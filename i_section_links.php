<!-- Service Section -->

<?php

$show_error = false;

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
    include "mail_error.php";
?>  

<section id="service" class="parallax-section">
     <div class="container">
          <div class="row">


 <?php
    $counter = 0;
    $cssClass = "";
    
    foreach($metadatajson->resource as $item){
        if($item->display_in_cards == true)
        {
            $counter++;
            $page_title = $item->title;
            $page_content_text  = $item->content_text;
            $page_content_type  = $item->content_type;
            

            if($counter%2 == 0)
                $cssClass = "bg-yellow";
            else
                $cssClass = "bg-white";

            if($counter == 4)
                $counter++;

            $data_wow_delay = $counter * 0.3;
          
  ?>             
              
              <!-- 1st row -->
              <div class="<?=$cssClass?> col-md-3 col-sm-6">
                    <div class="wow fadeInUp service-thumb" data-wow-delay="<?=$data_wow_delay?>s">
                         <a href="/<?=$page_content_type?>" ><?=$page_title?></a>
                              <p class="color-white"><?=$page_content_text?></p>
                    </div>
               </div>
  <?php               
        }
      }
  ?>   
          </div>
     </div>
</section>

