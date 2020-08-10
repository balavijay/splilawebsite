<?php

$show_error = false;

$metadata_url = "data/spquotes.JSON";


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

    <section id="quotes" class="parallax-section">
        
        <div class="container">
            <div class="row">

            <div class="testimony-slide">
            <figure class="wow fadeInUp" data-wow-delay="0.1s">
                <img src="https://anvfnzuaen.cloudimg.io/crop/184x178/x/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/ic_sp_1.jpg" alt="Srila Prabhupada">
            </figure>
            <span data-wow-delay="0.1s">Srila Prabhupada </span>
            </div>

            <div id="q_carousel">
                <div id="q_slides">
                <ul>

                        <?php 
                        
                       
                            foreach($metadatajson->resource as $item)

                            {
                               
                                if($item && $item->content_text != NULL ) 
                                {
                                    

                        ?> 
                                        
                                        <li class="slide">
                                        <div class="quoteContainer">
                                            <blockquote data-wow-delay="0.2s">
                                                &ldquo; <?=$item->content_text?>  &rdquo;
                                                <br /> <span class="reference"> <?=$item->reference_text?> </span> 
                                            </blockquote>
                                        </div>
                                        
                                        </li>
                                            
                                        

                        <?php 
                                        
                                
                                } // End of If 
                            } // End of For-loop 1
                        ?>    

                </ul>
                </div>  
                <div class="btn-bar"><div id="q_buttons"><a id="prev" href="#" class="fa fa-arrow-circle-left" > &nbsp; </a> <a id="next" href="#" class="fa fa-arrow-circle-right" > &nbsp;  </a> </div></div>
    
            </div>    

            </div>
        </div>
    </section>






<script>
$(document).ready(function () {

$("#q_carousel span").removeProp( "style" );

//rotation speed and timer
var speed = 20000;

var run = setInterval(rotate, speed);
var q_slides = $('.slide');
var container = $('#q_slides ul');
var elm = container.find(':first-child').prop("tagName");
var item_width = container.width();
var previous = 'prev'; //id of previous button
var next = 'next'; //id of next button
q_slides.width(item_width); //set the q_slides to the correct pixel width
container.parent().width(item_width);
container.width(q_slides.length * item_width); //set the q_slides container to the correct total width
container.find(elm + ':first').before(container.find(elm + ':last'));
resetq_slides();


//if user clicked on prev button

$('#q_buttons a').click(function (e) {
    //slide the item

    if (container.is(':animated')) {
        return false;
    }
    if (e.target.id == previous) {
        container.stop().animate({
            'left': 0
        }, 1500, function () {
            container.find(elm + ':first').before(container.find(elm + ':last'));
            resetq_slides();
        });
    }

    if (e.target.id == next) {
        container.stop().animate({
            'left': item_width * -2
        }, 1500, function () {
            container.find(elm + ':last').after(container.find(elm + ':first'));
            resetq_slides();
        });
    }

    //cancel the link behavior
    return false;

});

//if mouse hover, pause the auto rotation, otherwise rotate it
container.parent().mouseenter(function () {
    clearInterval(run);
}).mouseleave(function () {
    run = setInterval(rotate, speed);
});


function resetq_slides() {
    //and adjust the container so current is in the frame
    container.css({
        'left': -1 * item_width
    });
}

});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
$('#next').click();
}

</script>

<link rel="stylesheet" href="https://sppbcdn.azureedge.net/files/css/quotes-style.css">
