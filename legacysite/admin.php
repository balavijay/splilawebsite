<?php
	
	session_start();
	
	$show_msg = false;
	$msg = "";
	
	include("dbconnection.php");
	
	$dbManger = new DBManager();
    $dbManger->getConnection();
		
	$query = "SELECT * FROM share_with_us";
	
 	$result = mysql_query($query) or die("Hare Krishna" . mysql_error());;

			
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Srila Prabhupada Lila | Memories from all locations</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/nav.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.png" >
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<header>
		
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

    	<div class="navbar-header">
	 		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span> 
	    	</button>
	      	<a class="navbar-brand logo" href="/">Srila Prabhupada Lila</a>
	 	</div>

		<div class="collapse navbar-collapse" id="myNavbar">
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="/"><span class=""></span> Home</a></li>
		      <li><a href="/srila-prabhupada-memories"><span class=""></span> Memories</a></li>
		      <li><a href="/acknowledge"><span class=""></span> Acknowledgements</a></li>
		      <li class="active" ><a href="/share-with-us"><span class=""></span> Share With Us</a></li>
		    </ul>
		</div>
  </div>
</nav>	
				
		
	</header>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
					<div class="banner-txt">Share With Us<span>Srila Prabhupada Lila</span></div>
				</div>
                <div class="col-sm-6"><img class="banner-pic img-responsive" src="/images/acknowledgment-prabhupada.png"></div>
            </div>
        </div>
    </header>

    <section class="g-100">
		<div class="container" style="background-color: white">
			
	
			
			<div class="row">
				
<?php			
		if ($result) {
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $title = $row['title'];
				$desc = $row['description'];
				$file = $row['file'];
				$id = $row['id'];
				$path = "/upload/" . $id . "_" . $file;
?>

			<div class="col-lg-12">
				Title: <?=$title?> <br>
				Desc: <?=$desc?> <br><br><br>
				Attach: <a href="<?=$path?>"><?=$file?></a>
			</div>
<?php				
				
            }
        }
			
?>								
			</div>
		</div>
	</section>
			
			
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; 2017, Srila Prabhupada Lila. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>

    <!-- Script -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body>

</html>
