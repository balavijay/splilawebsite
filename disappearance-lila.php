<?php




	session_start();

		

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
   
    <meta name="apple-itunes-app" content="app-id=1211997347">

    <title>Srila Prabhupada Lila</title>
    <link rel="shortcut icon" href="https://sppbcdn.azureedge.net/images/favicon.ico" >
    
    	

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Styles and Head includes -->
    <?php
        include "i_head_scripts.php";
    ?>
    <?php
        include "i_styles.php";
    ?>

    <!-- PRE LOADER -->

    <div class="preloader">
        Loading ...
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




<?php
    include "mail_error.php";
?>  

<section class="parallax-section" >
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <br /><br />

                <ul >
                    <li style="display: inline-block; margin:5px; "><a style=" font-size:18px; font-weight:400;" href="/episode01.php" > Episode 1 - Vrindavana <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada%20in%20Vrindavana%201977.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style=" font-size:18px; font-weight:400;" href="/episode02.php" > Episode 2 - Hrisikesh <br > <img class="card-img-top"  src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada%20preaching.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style=" font-size:18px; font-weight:400;" href="/episode03.php" > Episode 3 - Vrindavana <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada%20having%20Deity%20Darshan.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style=" font-size:18px; font-weight:400;" href="/episode04.php" > Episode 4  - London <br > <img class="card-img-top"    src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada's%20last%20visit%20to%20England.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style=" font-size:18px; font-weight:400;" href="/episode05.php" > Episode 5 - Bombay <br > <img class="card-img-top"     src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Prabhupada%20in%20Bombay.png" width="200px" alt=" "></a></li>
                    <li style="display: inline-block; margin:5px; "><a style=" font-size:18px; font-weight:400;" href="/episode06.php" > Episode 6 - Vrindavana <br > <img class="card-img-top" src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sptoday/Srila%20Prabhupada's%20accepts%20samadhi.png" width="200px" alt=" "></a></li>
                </ul>            
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

       function changeWidthForMobile() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

          // Android detection 
          if (/android/i.test(userAgent)) {
            $("#videoframe").attr("width", "100%");
          }

          // iOS detection 
          if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            $("#videoframe").attr("width", "100%");
          }

          
      }

        changeWidthForMobile();

</script>   

</body>

</html>
