<?php
	
	session_start();
	

	$acks = array();
	
	array_push($acks, array("H.G. Bhaktisiddantha Dasa", "hg-bsd.png"));
	array_push($acks, array("H.H. Giriraja Swami", "hh-gs.png"));
	array_push($acks, array("H.G. Gurudas Dasa", "hg-gp.png"));
	array_push($acks, array("H.G. Harisauri Dasa", "hg-hp.png"));
	array_push($acks, array("H.G. Kurma Dasa", "hg-kp.png"));
	array_push($acks, array("H.H. Lokanath Swami", "hh-ls.png"));
	array_push($acks, array("H.G. Mahamaya Devi Dasi", "hg-mm.png"));
	array_push($acks, array("H.H. Mahanidhi Swami", "hh-ms.png"));
	array_push($acks, array("H.G. Siddantha Dasa", "hg-sp.png"));
	
	array_push($acks, array("H.G. Sruthakirthi Dasa", "hg-shrutakirthi-prabhu.png"));
	array_push($acks, array("H.G. Vaiyasaki Dasa", "hg-vp.png"));
	array_push($acks, array("H.G. Yadubara Dasa", "hg-yp.png"));
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Srila Prabhupada Lila | Acknowledgements</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style_v3.css" rel="stylesheet">
    <link href="/css/navi.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.png" >
    	<link href="/css/footer-v1-updated.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101536342-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-101536342-1');
</script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
	include_once "menu_items.php";
?>
		<div class="sticknav breadcrumb">
			<a class="" href="/">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a class="active" href="#">Acknowledgements</a>
		</div>
		
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
					<div class="banner-txt">Acknowledgements<span>Srila Prabhupada Lila</span></div>
				</div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="/images/acknowledgment-prabhupada.png"></div>
            </div>
        </div>
    </header>

    <section class="g-100">
		<div class="container" style="background-color: white">
			
		
			
			<div class="row">
				
			<div style="text-align:justify;padding-left: 40px;padding-right: 40px; padding-top: 40px">
				<p>
					<i><span style="font-weight:bold;">S</span>rila Prabhupada Lila</i> is a mobile app and website developed by a team of devotees 
					working to increase awareness and appreciation of Srila Prabhupada, 
					his message, saintly personality, mission and institution. We were able to work on this project only by the blessings of the Vaishnava
					community, Srila Prabhupada and all the Acharyas. We are indebted to various authors who had painstakingly recorded memories of Srila 
					Prabhupada in various biographical works. Owing to their effort, the second generation of devotees in ISKCON are able to get a glimpse 
					of what it was to be with Srila Prabhupada.
				</p>
				
				<p><span style="font-weight:bold;">W</span>e are especially grateful and profusely thank the 
					following devotees and disciples of Srila Prabhupada who agreed to share their 
					works online on this website:
				</p>
			</div>
			
				<div class="col-md-12 memory-box">
					<ul>
						
<?php						

					foreach($acks as $a)
					{
						$name = $a[0];
						$img = $a[1];
?>

						<li class="col-md-3">
							<div class="ack-box">					
								<img class="img-responsive img-hover" src="/images/ack/<?=$img?>" alt="">
								<h5><?=$name?></h5>
							</div>
						</li>
<?php
					}							
?>
						
						<!--
							<li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>
							<li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>
							<li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>
							<li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>
							<li class="col-md-3"><img class="img-responsive img-hover" src="/images/ack/hg-bsd.png" alt=""><h3>Srila Prabhupada</h3></li>
						-->
					</ul>
				</div>
				
				<div style="text-align:justify;padding: 40px;"
	
					<p>
						<span style="font-weight:bold;">A</span>ll photos of Srila Prabhupada used herein are courtesy of the Bhaktivedanta Book Trust International Inc. 
						- www.krishna.com. Used with permission. If you find any copyright violations in this app and website please notify us so that we may 
						remove it.
					</p>
					<p><span style="font-weight:bold;">W</span>e invite devotees from all over the world to share more pastimes of 
						Srila Prabhupada through this website so that it can reach the community of devotees. 
						
					</p>
				</div>
							
								
			</div>
		</div>
	</section>
	
	
	<!-- Footer -->
	<footer>
<?php
	include_once "footer_links.php";
?>	
	</footer>

    <!-- Script -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script  src="/js/navi.js"></script>    

<script>
<!-- collpase menu if opened -->
$(document).on('click',function(){
$('.collapse').collapse('hide');
})
</script> 
</body>

</html>
