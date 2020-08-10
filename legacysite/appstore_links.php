<?php

		require_once 'Mobile_Detect.php';
		$detect = new Mobile_Detect;
	
		
		$show_appstore = false;
		$show_playstore = false;
		
		if($detect->isiOS())
			$show_appstore = true;
		else if($detect->isAndroidOS() )
			$show_playstore = true;
		else{
				$show_appstore = true;
				$show_playstore = true;
			}
		
 ?>		

	<section class="g-1">
	
<div class="container">

<?php
	if($show_appstore)
	{
?>
    <div class="row">
      <div class="span4"></div>
        <div class="span4"> <br/>
        	<a href="https://itunes.apple.com/us/app/srila-prabupada-lila/id1211997347?ls=1&mt=8" target="_blank">
        	<img class="center-block img-responsive img-hover" src="images/download-on-the-app-store.png"/>
        	</a>
        </div>
        
      <div class="span4"></div>
    </div>
<?php
	}
?>    

<?php
	if($show_playstore)
	{
?>
    <div class="row">
      <div class="span4"></div>
        <div class="span4"><br/>
        	<a href="https://play.google.com/store/apps/details?id=org.srilaprabhupadalila&hl=en" target="_blank">
        	<img class="center-block img-responsive img-hover" src="images/google-play-badge-300x89.png"/>
        	</a>
        </div>
      <div class="span4"></div>
    </div>
    
<?php
	}
?>

</div>

				
	</section>

<?php

?>