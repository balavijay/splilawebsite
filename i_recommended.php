
<?php

$show_error = false;

$day = date("d");

$mon = date("m");



$date_str = date("F") . "-" . $day;


$today_url = "http://srilaprabhupadalila.com/v2/api/card?queryId=QUERY_GET_ALL_CARDS_FOR_DAY&args=day:$day,month:$mon,strips:1&resolution=xxxhdpi";


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

<?php
    include "mail_error.php";
?>  

            <div class="panel panel-default">
                <div class="panel-heading"><b>Recommended for You</b></div>
                <div class="panel-body">

                    <ul>
<?php
        

        $resource = $json->resource;
        
        $randomNumber = rand(0,2);

        if( $randomNumber == 0 )
            $randomNumber = 1;
        else
            $randomNumber = $randomNumber * 5;

           
        foreach($resource as $item)
        {
            if(isset($item->strip)  && $item->strip->title == "Recommended for You" && $item->strip->title != NULL)
           {
            $cards = $item->strip->cards;
            $counter = 0;
            foreach($cards as $card)
            {
                $counter++;
                if($counter >= $randomNumber && $counter <= ($randomNumber+5) )
                {

?>
                                <li>  <a href="#" data-toggle="modal" data-target="#modal_<?=$counter?>" > <?=$card->title?> </a></li>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_<?=$counter?>" role="dialog" style="display:none">
                                <div class="modal-dialog">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title"> <?=$card->title?> </h3>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?=$card->thumbnail_url?>"  align="left" style="padding-right: 15px; width:300px;" />
                                        <?=$card->content_text?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                    
                                </div>
                                </div>  
                                                                
                                
<?php
           }
        }
        }
        }
?>        

							</ul>
						</div>
                    </div>
                    
                   

<script>
$(function() {

$("font").removeProp("face");
$("font").removeProp("size");
$("font").removeProp("color");
$("font").prop("class", "fontclass");


});
</script>                  
