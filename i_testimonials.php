<?php

$show_error = false;

$metadata_url = "data/testimonials.JSON";


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

    <section id="testimonials" class="parallax-section">
        
        <div class="container">
            <div class="row">

            <div id="t_carousel" class="testimony-slide">
                <div id="t_slides">
                <ul>
                <?php
                                        
                    foreach($metadatajson->resource as $item){
                        $name = $item->name;
                        $content_url = $item->content_url;
                        $content_text = $item->content_text;
                                                
                ?>    

                        <li class="t_slide">
                            <div class="quoteContainer">
                                <figure  >
                                    <img src="https://anvfnzuaen.cloudimg.io/crop/120x120/x/https://sppb.blob.core.windows.net/images/splilawebsite/testimonials/<?=$content_url?>" alt="<?=$name?>" >
                                </figure>
                                <span ><?=$name?> </span>
                                <blockquote>
                                    <?=$content_text?>
                                </blockquote>
                            </div>
                        </li>

                <?php
                    }
                ?>
              
                      
                 

                </ul>
                </div>  
    
            </div>    

            <div class="btn-bar"><div id="t_buttons"><a id="t_prev" href="#" class="fa fa-arrow-circle-left" > &nbsp; </a> <a id="t_next" href="#" class="fa fa-arrow-circle-right" > &nbsp;  </a> </div></div>

            </div>
        </div>
    </section>






<script>
$(document).ready(function () {



//rotation speed and timer
var t_speed = 10000;

var t_run = setInterval(t_rotate, t_speed);
var t_slides = $('.t_slide');
var t_container = $('#t_slides ul');
var t_elm = t_container.find(':first-child').prop("tagName");
var t_item_width = t_container.width();
var t_previous = 't_prev'; //id of previous button
var t_next = 't_next'; //id of next button
t_slides.width(t_item_width); //set the t_slides to the correct pixel width
t_container.parent().width(t_item_width);
t_container.width(t_slides.length * t_item_width); //set the t_slides container to the correct total width
t_container.find(t_elm + ':first').before(t_container.find(t_elm + ':last'));
resett_slides();


//if user clicked on prev button

$('#t_buttons a').click(function (e) {
    //slide the item

    if (t_container.is(':animated')) {
        return false;
    }
    if (e.target.id == t_previous) {
        t_container.stop().animate({
            'left': 0
        }, 1500, function () {
            t_container.find(t_elm + ':first').before(t_container.find(t_elm + ':last'));
            resett_slides();
        });
    }

    if (e.target.id == t_next) {
        t_container.stop().animate({
            'left': t_item_width * -2
        }, 1500, function () {
            t_container.find(t_elm + ':last').after(t_container.find(t_elm + ':first'));
            resett_slides();
        });
    }

    //cancel the link behavior
    return false;

});

//if mouse hover, pause the auto rotation, otherwise rotate it
t_container.parent().mouseenter(function () {
    clearInterval(t_run);
}).mouseleave(function () {
    t_run = setInterval(t_rotate, t_speed);
});


function resett_slides() {
    //and adjust the container so current is in the frame
    t_container.css({
        'left': -1 * t_item_width
    });
}

});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function t_rotate() {
$('#t_next').click();
}

</script>

<link rel="stylesheet" href="https://sppbcdn.azureedge.net/files/css/quotes-style.css">
