<?php



	define("SEO", "enabled");



	if(SEO == "enabled")

		$mlink = "/srila-prabhupada-memories";

	else

		$mlink = "memory_home.php";

		

	session_start();

		

	$_SESSION['start'] = true;

	//$_SESSION['session_id'] = "201995d0-7f48-11e7-892f-0242e32748bc-56";

	$_SESSION['SEO'] = SEO;



	include_once("common.php");



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
        
    <meta property="og:url" content="https://www.srilaprabhupadalila.org/index.php" />

    <meta property="og:type" content="article" />

    <meta property="og:image" content="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/srila-prabhupada-01.jpg" />

    <meta property="og:title" content="Srila Prabhupada Lila" />

    <meta property="og:description" content="The life and teachings of a pure devotee. His Divine Grace A.C. Bhaktivedanta Swami Srila Prabhupada. Founder Acharya of the International Society for Krishna Consciousness " />
    
    
    <?php
    include "i_head_scripts.php";
    ?>   

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
   
    <!-- Styles and Head includes -->
    <?php
    include "i_styles.php";
    ?>
	



    <!-- Navigation Section -->

    <?php
    include "i_menu_items.php";
    ?>	

    




    <!-- Home Section -->

    <section id="home" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-5 col-sm-5" style="padding:0px;">
                    <div class="home-img"></div>
                </div>

                <div class="col-md-7 col-sm-7">
                    <div class="home-thumb">
                        <div class="section-title home-title" >
                            
                       
                            <span class="wow fadeInUp" data-wow-delay="0.2s" > The life and teachings of a pure devotee </span>
                                
                            <span><h1>His Divine Grace A.C. Bhaktivedanta Swami Srila Prabhupada</h1> </span>
                            <span class="small" >Founder Acharya of the International Society for Krishna Consciousness</span>
                            


                            <br /><br />

                            <span  class="wow fadeInUp" data-wow-delay="0.2s">
                                <i>
                                Know his
                                
                                <a href="/srila-prabhupada-memories" >glorious pastimes</a>,  
                                <a href="/srila-prabhupada-analogies" >analogies</a>, 
                                <a href="/108_temples" >temples</a>
                                 and more ... 
                                </i>
                            </span> 
                                                        

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section id="about" class="parallax-section showHideSection" style="display:none;">
    <div class="container">
        <div class="row  m-pad-bottom" style="background: #4280d0;">

            <div class="col-md-12" style="padding:22px 32px 32px 32px;">
            
                <h1> </h1>
               
                <br />

               
            </div>
        </div>
    </div>
    </section>

    <br />

<ul class="nav nav-tabs" role="tablist">
    <li id="hometab" data-tabname="home_tab" class="active" ><a >Home</a></li>
    <li id="trending" data-tabname="trending_tab"><a   >Trending </a></li>
    <li id="recent" data-tabname="recent_tab"><a   >New </a></li> 
    <li id="donate" data-tabname="donate_tab"><a ><i class='fa fa-usd red'></i>   <span class='red'>Donate</span> </a></li> 
</ul>



<div class="tabpanel">
    <!-- home_tab -->
    <div class="csspanes" id="home_tab">
        <div class="">
            <div  class="row">
                    <!-- Auto Card Loader Section -->
                    <?php
                        include "i_auto_card_loader_today.php";
                    ?>


                    <!-- Auto section Loader  -->
                    <?php
                            include "i_auto_section_loader.php";
                    ?>

                    <!-- Auto Card Loader Section -->
                    <?php
                        include "i_auto_card_loader.php";
                    ?>
            </div>
        </div>
    </div>
    <!-- trending_tab  -->
	<div class="csspanes" id="trending_tab" style="display:none">
        <div class="">
            <div  class="row" id="trending_row">
                Loading ...
            </div>
        </div>
    </div>
    <!-- recent_tab -->
	<div class="csspanes" id="recent_tab" style="display:none">
        <div class="">
            <div  class="row" id="recent_row">
            Loading ...
            </div>
        </div>
    </div>
    <!-- donate_tab -->
	<div class="csspanes" id="donate_tab" style="display:none">
        <div class="">
            <div  class="row" id="donate_row">
            
            </div>
        </div>
    </div>
    

	
</div>

        

    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    
    

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>

<!--- Did you Know section  -->
<?php
   // include "did_you_know.php";
?>
   
<script>

    var startDate = new Date('2019-05-24');
    var endDateAfter = new Date('2019-05-27');
    var today  = new Date();

    if((today > startDate) && (today < endDateAfter))
    {
        $(".showHideSection").show();
    }
    else{
        $(".showHideSection").hide();
    }



    $(".nav-tabs li").click(function() {

        $(this).siblings().removeClass("active");
        $(this).addClass("active");

        var tabname = $(this).attr("data-tabname");
        $("#" + tabname).siblings().hide();
        $("#" + tabname).show();

        if(tabname == "trending_tab") {
            $("#trending_row").html("&nbsp; &nbsp; &nbsp; Loading ...");

            var jqxhr = $.get( "ajax_trending.php" , function(data) {
            
                $("#trending_row").html(data);

            });
        } else if(tabname == "recent_tab") {
            
            $("#recent_row").html("&nbsp; &nbsp; &nbsp; Loading ...");

            var jqxhr = $.get( "ajax_recent.php" , function(data) {
            
                $("#recent_row").html(data);
                
            });
        } else if(tabname == "donate_tab") {
            
            $("#donate_row").html("&nbsp; &nbsp; &nbsp; Loading ...");

            var jqxhr = $.get( "ajax_donate.php" , function(data) {
            
                $("#donate_row").html(data);
                
            });
        }


       // scrolltotitle("#memory-title");

    });

</script>

<style>
    .nav-tabs>li {
        font-weight: bold;
        cursor:pointer;
    }
</style>
    

</body>

</html>
