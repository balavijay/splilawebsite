<?php

	/* Register all handlers here */
	$route = array(
	"srila-prabhupada-memories" => "memory_home.php",
	
	/* Listing of categories */
	"memories-by-locations"		=> "memory.php",
	"memories-by-devotees"		=> "memory.php",
	"memories-by-qualities"		=> "memory.php",
	"memories-by-topics"		=> "memory.php",
	
	/* Listing of memories by category */
	"memories-by-location"		=> "memory_listing.php",
	"memories-by-devotee"		=> "memory_listing.php",
	"memories-by-topic"			=> "memory_listing.php",
	"memories-by-quality"		=> "memory_listing.php",

	/* All Readings */
	"srila-prabhupada-today"	=> "memory_read.php",
	"memory-of-the-day"			=> "memory_read.php",
	"rare-picture-of-the-day"	=> "memory_read.php",
	"anecdote-of-the-day"		=> "memory_read.php",
	"quote-of-the-day"			=> "memory_read.php",
	"interesting-facts"			=> "memory_read.php",
	"first-publication-dates"	=> "memory_read.php",
	"places-made-holy"			=> "memory_read.php",
	"prabhupadas-travels"		=> "memory_read.php",
	"first-visits"				=> "memory_read.php",
	"location"					=> "memory_read.php",
	"devotee"					=> "memory_read.php",
	"quality"					=> "memory_read.php",
	"topic"						=> "memory_read.php",
	"share-with-us"				=> "share_with_us.php",
	"acknowledge"				=> "acknowledge.php",
	"videos"					=> "memory_read.php",	
	
	/* Menu Listing */
	"quotes"								 => "menu_content_popup.php",
	"quick-facts"							 => "menu_content_popup.php",
	"srila-prabhupada-illustrated-biography" => "menu_content_popup.php",
	"srila-prabupada-rare-pictures" 		 => "menu_content_popup.php",
	"voyage-of-compassion" 		 			 => "menu_content_popup.php",
	"srila-prabhupada-analogies" 		 	 => "menu_content_popup.php",
	"eulogies-by-eminent" 		 	 		 => "menu_content_popup.php",
	"predictions" 		 	 		 		 => "menu_content_popup.php",
	"poetry-by-prabhupada" 		 	 		 => "menu_content_popup.php",
	"poetry-for-prabhupada" 		 	 	 => "menu_content_popup.php",
	
	);
	
	
	$uri = $_SERVER['REDIRECT_URL'];
	
	$uri = str_replace("splila/", "", $uri);
	$uri = trim($uri, "/");
	
	$_SERVER['REDIRECT_URL'] = $uri;
	
	
	$paths = explode ("/",$uri);
	
	
	$target = $paths[0];
	
	if(array_key_exists($target, $route))
	{
		$module = $route["$target"];
	
	
		$_GET['routed'] = "1";
		$_GET['q'] = $_SERVER['REDIRECT_URL'];
	
		/* A Teak for menu items */
		if($module == "menu_content_popup.php" && isset($paths[1]))
			$module = "memory_read.php";
			
		include_once "$module";
	}
	else{
		header("Location: /");
	}
?>