<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://sppbcdn.azureedge.net/files/js/ui/1.12.1/jquery-ui.min.js"></script>


<?php

$metadata_url = "data/didyouknow.JSON";


$metadata  = file_get_contents($metadata_url);
$metadatajson = json_decode($metadata);
?>

<div  id="popupCloseRight"  title="Did you Know !" style="display:none; background:#d8f1fe;">

<?php
foreach($metadatajson->resource as $item){
?>
    <p id="dyk_<?=$item->id?>"  style="display:none; color:#000"><?=$item->content_text?></p>
<?php
}
?>


    
</div>


<!--
 <div  id="popupCloseRight"  title="Prabhupada Analogies" style="display:none; background:#d8f1fe;">
     <br />
    Srila Prabhupada brings us the knowledge of the Vedic literatures with his hard hitting analogies. Open by clicking on the <img src="images/menu_burger_icon.png" style="display:inline;" /> icon on top right corner of the page, and select "Prabhupada Analogies". 

   
    
     <br /><br />

 </div>
-->

<script>

    var totalChildren = $("#popupCloseRight").children().length;

    if(!totalChildren)
        totalChildren = 10;

    var randomNumber = Math.floor(Math.random() * totalChildren);

 
    if(randomNumber == 0)
        randomNumber = 1;

    $("#dyk_" + randomNumber).show();


if(sessionStorage.getItem("daily") == null){

    var openAfter = 10;
    var closeAfter = 85;

    setTimeout(function() { $( "#popupCloseRight" ).dialog({
                                    open: function() {
                                        $(this).closest(".ui-dialog")
                                        .find(".ui-dialog-titlebar-close")
                                        .removeProp("class")
                                        .html("<span style='color:red; padding-bottom:5px;'> x </span>");

                                        sessionStorage.setItem("daily", "true");
                                    }
                                }); }, openAfter * 1000 );

    setTimeout(function() { $( "#popupCloseRight" ).dialog( "close" ); }, closeAfter * 1000 );

}




</script>
