<?php

	session_start();
	


	include_once("common.php");
	
	
	/* Identify the Request */
	if(isset($_GET['routed']))
	{
		$q = $_GET['q'];

		$resource = "location";
		$seo_cat = "";
		if($q == "memories-by-locations")
		{
			$resource = "location";
			$type = "Locations";
			$seo_cat = "memories-by-location";
			$page_title = "Srila Prabhupada Lila - Memories from all locations";
		}
		else if($q == "memories-by-devotees")
		{
			$resource = "devotee";
			$type = "Devotees";
			$seo_cat = "memories-by-devotee";
			$page_title = "Srila Prabhupada Lila - Memories by devotees";
		}
		else if($q == "memories-by-qualities")
		{
			$resource = "quality";
			$type = "Qualities";
			$seo_cat = "memories-by-quality";
			$page_title = "Srila Prabhupada Lila - Memories by quality";
		}
		else if($q == "memories-by-topics")
		{
			$resource = "keyword";
			$type = "Topics";
			$seo_cat = "memories-by-topic";
			$page_title = "Srila Prabhupada Lila - Memories by topics";
		}
		
	}else{
		die();
	}
	
		
		
	//$sid  = $_SESSION['session_id'];
	$show_error = false;
	
	$url = "http://52.172.29.49/api/$resource?queryId=QUERY_ALL&args=dummy:dummy,resolution:xxxhdpi";
	
	$data  = file_get_contents($url);
	
	if($data === FALSE)
	{
			/* No content from server */
		$show_error = true;
	}else{
		$json = json_decode($data);
		if($json == NULL)
			$show_error = true;
		else if( $json->errCode != 0)
			$show_error = true;
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$page_title?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style_v3.css" rel="stylesheet">
    <link href="/css/navi.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.png">
	<link rel="stylesheet" href="/css/jquery.typeahead.min.css">
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
			<a class="" href="/">Home</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a href="/srila-prabhupada-memories">Memories</a>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
			<a class="active" href=""><?=$type?></a>
		</div>		


    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
					<div class="banner-txt"><?=$type?><span>Srila Prabhupada Lila</span></div>
				</div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="/images/location-prabhupada.png"></div>
            </div>
        </div>
    </header>

    <section class="g-100">
		<div class="container">
		<!--
			<div class="row">
				<div class="col-md-12">
					<div class="sort-by-country">
						<form id="form-country_v1" name="form-country_v1">
							<div class="typeahead__container">
								<div class="typeahead__field">						 
									<span class="typeahead__query">
										<input class="js-typeahead-country" name="country_v1[query]" type="search" placeholder="Sort by Country" autocomplete="off">
									</span>
									<span class="typeahead__button">
										<button type="submit">
											<i class="typeahead__search-icon"></i>
										</button>
									</span>						 
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		-->
			
			
			
<?php
	if($show_error)
	{
?>		
		
	<div class="row">
				<div class="col-lg-12">
					<p class="red">There is a problem in loading the memories. Please visit again</p>
				</div>
	</div>
<?php
	}else{
?>


	<div class="row">
				
<?php
		
		$resource = $json->resource;
		
		foreach($resource as $card)
		{
			$name = $card->name;
			$image = $card->image_url;
			if(isset($card->summary))
				$summary = $card->summary;
			else
				$summary = "Initiated by Srila Prabhupada on (Unknown) at (Unknown)";
			$read = $card->read;
			$cnt = $card->count;
			$id = $card->id;
			if($cnt == 0)
				continue;
			
			$seo_name = seo_friendly_string($name);
			$seo_type = seo_friendly_string($seo_cat);
			
				$link = "/$seo_type/$seo_name/$id";
?>				
				<div class="col-md-3 col-sm-6 img-portfolio">
					<div class="set-box location-list">					
						<a class="homepic square" href="<?=$link?>">
							<img data-src="<?=$image?>" class="img-responsive img-hover lazyload" />

						</a>
						<div class="list-txt">
							<a href="<?=$link?>">
								<h3><?=$name?></h3>
								<p><?=$summary?></p>
							</a>
							
							<!--
							<span class="stag">Read <span class="total-art"><?=$read?></span>/<span class="read-art"><?=$cnt?></span></span>
							-->
							<span class="stag">Total: <span class="read-art"><?=$cnt?></span></span>
						</div>
					</div>
				</div>
			
<?php
		}
	}
?>
	</div>
			
		</div>
	</section>
	

	<!-- Footer -->
	<footer>
<?php
	include_once "footer_links.php";
?>	
	</footer>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
	<script src="/js/lazysizes.min.js"></script>
	<script  src="/js/navi.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.typeahead.min.js"></script>
	<script>
		$.typeahead({
			input: '.js-typeahead-country',
			order: "desc",
			source: {
				data: [
					"Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
					"Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh",
					"Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia",
					"Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma",
					"Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad",
					"Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the",
					"Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti",
					"Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
					"Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon",
					"Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea",
					"Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India",
					"Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
					"Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos",
					"Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg",
					"Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
					"Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco",
					"Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger",
					"Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru",
					"Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino",
					"Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone",
					"Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain",
					"Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan",
					"Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
					"Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
					"Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
				]
			},
			callback: {
				onInit: function (node) {
					console.log('Typeahead Initiated on ' + node.selector);
				}
			}
		});
	</script>

</body>

</html>
