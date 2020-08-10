<?php



		

	session_start();

		

	$_SESSION['start'] = true;

	$_SESSION['SEO'] = SEO;



    include_once("common.php");
    
    $page_type = $_GET['q'];

    $img_prefix = "";
    $img_type   = "";

   if( $page_type == "srila-prabupada-rare-pictures" )
    {
        $img_prefix = "RP";
        $img_type   = "rare_picture";
    }
        
    
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
    include "i_styles.php";
    ?>
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


<link rel="stylesheet" href="https://srilaprabhupadalila.org/css/lightgallery.css" />
<section id="experience" class="parallax-section" style="display:<?=$dynamicSection?>">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="color-white experience-thumb">
                         

                         <div class="wow fadeInUp color-white media" data-wow-delay="1.2s">
                            <div class="demo-gallery">
                            
                                <ul id="lightgallery" class="list-unstyled row">
                                
                               
                                <?php
                                   
                                    for($i = 6; $i >= 1; $i--)
                                    {
                                        $img_count = $numberOfDays + $i;
                                        if($img_count > 367) 
                                            $img_count = $img_count % 367;
                                        
                                        $img_count = str_pad($img_count, 3, '0', STR_PAD_LEFT);

                                        $display1_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/rare_picture/xxxhdpi/RP". $img_count .".png";

                                        $display2_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sp_today/xxxhdpi/SPT". $img_count .".png";
                                   
                                        $display3_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/lila_smaran_1/xxxhdpi/LSO". $img_count .".png";

                                        $display4_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/lila_smaran_2/xxxhdpi/LST". $img_count .".png";

                                ?> 
                                
                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/<?=$display1_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/164x123/webp/<?=$display1_photo?>"> 
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/<?=$display2_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/164x123/webp/<?=$display2_photo?>"> 
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/<?=$display3_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/164x123/webp/<?=$display3_photo?>"> 
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/<?=$display4_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/164x123/webp/<?=$display4_photo?>"> 
                                                    </a>
                                                </li>

                                                
                                
                                <?php 
                                         // End of If 
                                    } // End of For-loop 1
                                ?>
                               
                                </ul>
                            </div><!--    demo-gallery -->
                         </div>

                         

                    </div>
               </div>

          </div>
     </div>
</section>

<script>
                                    function pad (str, max) {
                                    str = str.toString();
                                    return str.length < max ? pad("0" + str, max) : str;
                                    }


                                    var date1 = new Date(new Date().getFullYear(), 0, 1); // 1st of Jan
                                    var date2 = new Date();                               // Today's date
                                    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

                                    diffDays++;

                                    var str_diffDays = pad(diffDays.toString(), 3); // difference date

                                    
                                    $('#lightgallery').prepend('<li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sp_today/PP/SPP'+ str_diffDays +'.png" ><a href=""><img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/164x123/webp/https://sppb.blob.core.windows.net/images/sp_today/PP/SPP'+ str_diffDays +'.png" ></a></li>');
                                    $('#lightgallery').prepend('<li class="col-xs-6 col-sm-4 col-md-3"  data-src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sp_today/xxxhdpi/SPT'+ str_diffDays +'.png" ><a href=""><img class="img-responsive" src="https://anvfnzuaen.cloudimg.io/cover/164x123/webp/https://sppb.blob.core.windows.net/images/sp_today/xxxhdpi/SPT'+ str_diffDays +'.png" ></a></li>');
                                    

                                </script>

<script type="text/javascript">
$(document).ready(function(){
    $('#lightgallery').lightGallery();
});

    $('.gallery3-img').error(function() {
        
        $(this).parent().parent().hide();
    });
</script>
<script src="https://sppbcdn.azureedge.net/files/js/lightgallery-all.min.js"></script>

    






    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>

   

</body>

</html>
