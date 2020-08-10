<?php
	
	session_start();
	
	$show_msg = false;
	$msg = "";
	
	include("dbconnection.php");
	
	if(isset($_POST['submit']))
	{
		$title = "";
		$desc  = "";
		$uploadfile = "";
		$id = "";
		$show_msg = true;
		
		if(isset($_POST['title']))
			$title = $_POST['title'];
		
		if(isset($_POST['description']))
			$desc = $_POST['description'];
		
		if(count($_FILES) && $_FILES['userfile']['size'] !=0 )
		{
			print_r($_FILES);
			/* File is uploaded */
			
			$uploaddir = getcwd() . "/upload/";
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
			
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
			{
				/* Add to Database */
				$id = add_to_database($title, $desc, basename($_FILES['userfile']['name']));
				
				$newpath = $uploaddir . $id . "_" . basename($_FILES['userfile']['name']);
				
				rename($uploadfile, $newpath);
				
				
				$msg = "Thank you very much for submitting the memory.";
			}else{
				/* File uploaded is failed */
				$msg = "Failed to save the attached file. Please try again.";
			}
		}else{
			if(strlen($desc) <= 20)
			{
				$msg = "We request you to send a valid memory.";
			}else{
				/* Add to Database */
				add_to_database($title, $desc, $uploadfile);
				$msg = "Thank you very much for submitting the memory.";
			}
		}
		
		
	}
	
	
function add_to_database($title, $desc, $uploadfile)
{
	$dbManger = new DBManager();
    $dbManger->getConnection();
	
	$title = mysql_real_escape_string($title);
	$desc  = mysql_real_escape_string ($desc);
	$uploadfile = mysql_real_escape_string ($uploadfile);
	
	$sql = "INSERT INTO `share_with_us` (`id`, `title`, `description`, `file`, `dt`) 
			VALUES (NULL, '$title', '$desc', '$uploadfile', CURRENT_TIMESTAMP);";
	
	mysql_query($sql) or die("Hare Krishna" . mysql_error());
	
	$id = mysql_insert_id();
	
	$dbManger->closeConnection();
	
	return $id;  
}

function setup_tables()
{
	$dbManger = new DBManager();
    $dbManger->getConnection();
	
	
	$sql = "
	
	CREATE TABLE `share_with_us` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `file` varchar(256) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	
	mysql_query($sql) or die("Hare Krishna" . mysql_error());
	
	$sql = "ALTER TABLE `share_with_us`
  ADD PRIMARY KEY (`id`);";
  
  mysql_query($sql) or die("Hare Krishna" . mysql_error());
  
  $sql = "ALTER TABLE `share_with_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
  
 mysql_query($sql) or die("Hare Krishna" . mysql_error());
  
	$dbManger->closeConnection();  
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
    <title>Srila Prabhupada Lila - Share memory with us</title>
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
			<a class="active" href="#">Share with us</a>
		</div>
		
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
			
		
<?php
	if($show_msg)
	{
?>		
		
	<div class="row">
				<div class="col-lg-12">
				<p class="red"><?=$msg?></p>
				</div>
	</div>
<?php
	}else{
?>		
			
			<div class="row">
				
				<div style="text-align:justify;padding: 40px;"
					<p>
					We, the devotees managing Srila Prabhupada Lila App and website, wish to have a single repository of all the pastimes of Srila Prabhupada, and those with his disciples and his organization ISKCON. We want this repository easily available to all the followers of Srila Prabhupada or his disciples. With the help of various vaishnavas we were able to collect thousands of pastimes, videos etc, 
					which are already available in the app and website. But we are sure that there is much more to be collected and curated for the purpose of ISKCON devotee community.
 				</p>
				<p>Hence we request you to share any of the following with us:</p>
				<ul>
				<li><span>Eyewitness accounts of Srila Prabhupada’s pastimes</span></li>
				<li>Testimonials or Glorifications by prominent personalities on Srila Prabhupada or his literature or his Organization></li>
				<li>ISKCON’s institutional history during Physical manifest lila of Srila Prabhupada and early 1980’s</li>
				<li>History of ISKCON Temples</li>
				<li>Pictures or videos of Paraphernalia associated with Srila Prabhupada</li>
				<li>Pictures or videos of Places associated with Srila Prabhupada, with relevant stories</li>
				<li>Pictures of Disciples of Srila Prabhupada (Latest or pre 1977)</li>
				<li>Any realizations of the devotees who had experienced any of the two above</li>
				<li>Videos, audios, documentaries, documents related to the above</li>

				</ul>
 				<p>We request you to mail across the above to <a href="mailto:srilaprabhupadalila@gmail.com">srilaprabhupadalila@gmail.com</a></p>
 
				<p>If you are interested in helping us in researching on the pastimes of Srila Prabhupada, please do get in touch with us at the aforementioned address.
				</p>
				

			</div>
			
			
			<form class="form-horizontal" method="POST" action="/share_with_us.php" enctype="multipart/form-data" style="margin: 20px">
				
			  <div class="form-group">
			    <label class="control-label col-sm-2">Title of the memory:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="title" id="title" placeholder="Title of the memory">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label class="control-label col-sm-2">Description:</label>
			    <div class="col-sm-10"> 
			      <textarea rows="10" cols="80" class="form-control" name="description" id="description" 
            placeholder="Type memory here or attach file"></textarea> 
			    </div>
			  </div>
			  
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			     
			     <div class="fileinput fileinput-new" data-provides="fileinput">
    			   </span><input name="userfile" type="file" /></span>
				 </div>
			     
			    </div>
			  </div>
			  
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="submit" class="btn btn-default">Submit</button>
			    </div>
			  </div>
			</form>
			
								
			</div>
		</div>
	</section>
<?php
	}
?>				

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
