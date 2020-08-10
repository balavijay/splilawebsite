<?php
	
	session_start();
	
	$llink = "../Locations/Memories-By-Locations";
	$dlink = "../Devotees/Memories-By-Devotees";
	$qlink = "../Qualities/Memories-By-Qualities";
	$tlink = "../Topics/Memories-By-Topics";


	$llink = "/memories-by-locations";
	$dlink = "/memories-by-devotees";
	$qlink = "/memories-by-qualities";
	$tlink = "/memories-by-topics";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Srila Prabhupada memories</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_v3.css" rel="stylesheet">
    <link href="css/navi.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
		<a class="" href="#">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i>
		<a class="active" href="#">Memories</a>
	</div>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
					<div class="banner-txt">Memories<span>Srila Prabhupada Lila</span></div>
				</div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="/images/memories-prabhupada.png"></div>
            </div>
        </div>
    </header>

    <section class="g-100">
		<div class="container">
			<div class="row">
				<div class="col-md-12 memory-box">
					<ul>
						<li class="col-md-3"><a href="<?=$llink?>">Memories by Locations</a></li>
						<li class="col-md-3"><a href="<?=$dlink?>">Memories by devotees</a></li>
						<li class="col-md-3"><a href="<?=$qlink?>">Memories by qualities</a></li>
						<li class="col-md-13"><a href="<?=$tlink?>">Memories by Topics</a></li>
					</ul>
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
