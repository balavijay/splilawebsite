<?php



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
    <link rel="shortcut icon" href="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.nethttps://sppbcdn.azureedge.net/images/favicon.ico" >
    <meta name="google-site-verification" content="onSh7fXq9QjtvocKY6mCJdObgziOAzjvevS7n4t-Woo" />

    <?php
    include "i_head_scripts.php";
    ?>	
    

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Head includes Section -->
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
    // $page_type = "srila-prabupada-rare-pictures";
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

<br /><br />


<ul class="nav nav-tabs" role="tablist">
    <li data-tabname="tab_1" class="active" ><a >Share Memory</a></li>
    <li id="tab_2_link" data-tabname="tab_2"><a   >Share Feedback</a></li>
    <li data-tabname="tab_3"><a   >Report a bug</a></li>        
  </ul>

  

  

<div class="tabpanel">

	<div id="tab_1">

        <div >
        <div class="container">
            <div class="row">
                <?php
                    include "i_share_memory.php"; 
                ?>
            </div>
        </div>
        </div>

    </div>
    <!-- end of tab 1 -->


    <div id="tab_2" style="display:none">

        <div >
        <div class="container">
            <div class="row">
                <?php
                    include "i_share_feedback.php"; 
                ?>
            </div>
        </div>
        </div>

    </div>
    <!-- end of tab 2 -->


    <div id="tab_3" style="display:none">

        <div >
        <div class="container">
            <div class="row">
                <?php
                    include "i_report_bug.php"; 
                ?>
            </div>
        </div>
        </div>

    </div>
    <!-- end of tab 3 -->



	
</div>

<br /><br />

    




    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>
    <script >
    $(".nav-tabs li").click(function() {

        $(this).siblings().removeClass("active");
        $(this).addClass("active");

        var tabname = $(this).attr("data-tabname");
        $("#" + tabname).siblings().hide();
        $("#" + tabname).show();

    });

    if(location.hash == "#feedback"){
        $("#tab_2_link").trigger("click");
    }
    </script>
       

</body>

</html>
