
<?php

$show_error = false;

$day = date("d");

$mon = date("m");



$date_str = date("F") . "-" . $day;


$today_url = "http://srilaprabhupadalila.com/v2/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:$day,month:$mon,strips:1,web:1&resolution=xxxhdpi";



$today  = file_get_contents($today_url);


if($today === FALSE)

{

    /* No content from server */

    $show_error = true;

}else{

    $json = json_decode($today);
   

    if($json == NULL)

        $show_error = true;

    else if( $json->errCode != 0)

        $show_error = true;


}

?>		


<section id="about" class="parallax-section">
        <div class="container">
        <?php
        

        $resource = $json->resource;
        $counter = 0;
        foreach($resource as $item)

        {
            if(isset($item->card) && isset($item->card->content_type) && $item->card->content_type != "QUOTE" && $item->card->content_type != NULL && $item->card->title != "Initiation ceremony")
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
                    <div><a href="/<?=$id?>" target="_blank"><img src="<?=$photo_url?>" height="" width="100%" /></a></div>
                </div>
            </div>
        <?php
            } else {
        ?>

            <!-- color2 Section -->
            <div class="row bg-yellow m-pad-top">
                <div class="col-md-6 col-sm-12">
                    <div><a href="/<?=$id?>" target="_blank"><img src="<?=$photo_url?>" height="" width="100%" /></a></div>
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
            }
        ?> 

        <?php
            }
        } // End of For Loop
        ?>
        </div>
    </section>

    <script src="https://sppbcdn.azureedge.net/files/js/continue-reading.js"></script>
