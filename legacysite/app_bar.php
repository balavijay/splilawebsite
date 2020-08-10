<?php

		require_once 'Mobile_Detect.php';
		$detect = new Mobile_Detect;
	
		if($detect->isiOS())
			$link = "https://itunes.apple.com/in/app/srila-prabupada-lila/id1211997347?mt=8";
		else
			$link = "https://play.google.com/store/apps/details?id=org.srilaprabhupadalila&hl=en";
			
		if(/* $detect->isiOS() ||*/  $detect->isAndroidOS() )
		{
 ?>	
    <header class="navbar app-store-inverse">
        <div class="app-store-bar">
        	<!--
        	<div class="row app-store-bar">
        		
  				<div class="col-sm-2"><a href="<?=$link?>">Install App for Free</a></div>
  				
			</div>
			-->
			<div class="appTile"><a href="<?=$link?>"> <img src="/images/sp-logo-1.jpg"> </a></div>
			<div class="appInfo"><a href="<?=$link?>"> <b>Install Srila Prabhupada Lila</b> 
				<p class="description smaller marginBottom0 marginBottom0Desktop">Free from the Play Store</p></a> 
			</div>			
        </div>
    </header>

<?php
		}
?>	
