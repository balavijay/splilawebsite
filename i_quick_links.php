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

<div class="list-group custom-list-group  ql-section" >
    <div class="card-body">
    <h1>Quick Links</h1>


            <?php

                $counter=0;
                foreach($metadatajson->resource as $item){
                    if($item->display_in_footer == true)
                    {
                        $counter++;
                        $page_title = $item->title;
                        $page_content_text  = $item->content_text;
                        $page_content_type  = $item->content_type;
                                               
                    
            ?>             
                    
                        <div >
                                <div class="ql-section-inner" >
                                    <a href="/<?=$page_content_type?>" ><?=$page_title?></a>
                                </div>
                        </div>
            <?php               
                    }
                }
            ?>   
</div>
</div>

<style>
    .ql-section {
        text-align: left;
        border: 1px solid #666;
        padding: 10px;
        border-radius: 20px;
    }

    .ql-section-inner{
        padding-top: 10px;
        font-size: 18px;
        font-weight: 500;
    }
</style>