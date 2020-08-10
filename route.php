<?php





	/* Register all handlers here */

	$route = array(

/* All Readings */

"srila-prabhupada-today"	=> "memory_read_standalone.php",

"memory-of-the-day"			=> "memory_read_standalone.php",

"rare-picture-of-the-day"	=> "memory_read_standalone.php",

"anecdote-of-the-day"		=> "memory_read_standalone.php",

"quote-of-the-day"			=> "memory_read_standalone.php",

"interesting-facts"			=> "memory_read_standalone.php",

"first-publication-dates"	=> "memory_read_standalone.php",

"places-made-holy"			=> "memory_read_standalone.php",

"prabhupadas-travels"		=> "memory_read_standalone.php",

"first-visits"				=> "memory_read_standalone.php",

"location"					=> "memory_read_standalone.php",

"devotee"					=> "memory_read_standalone.php",

"quality"					=> "memory_read_standalone.php",

"topic"						=> "memory_read_standalone.php",

"videos"					=> "memory_read_standalone.php",

"read"					=> "memory_read_standalone.php",		

	/* newsite Menus */
	"/"									=> "index.php",
	
	"quick-facts"						=> "gallery1.php",

	"quotes"							=> "gallery2.php",
	"srila-prabupada-rare-pictures"		=> "gallery2.php",


	"srila-prabhupada-analogies"		=> "gallery3.php",
	"poetry-by-prabhupada"				=> "gallery3.php",
	"poetry-for-prabhupada"				=> "gallery3.php",
	"srila-prabhupada-biography"		=> "gallery3.php",
	"eulogies-by-eminent"				=> "gallery3.php",
	"predictions"						=> "gallery3.php",
	"voyage-of-compassion"				=> "gallery3.php",
	"sp-rooms"							=> "gallery3_sprooms.php",
	"sp-stories"						=> "gallery3.php",
	"sp-articles"						=> "gallery3.php",
	"photo-pastimes"					=> "gallery3.php",
	"sp-letters"						=> "gallery3.php",
	"news-articles"						=> "gallery3.php",
	"newsletter-archive"				=>	"newsletter-archive.php",


	"108_temples"						=> "gallery4.php",


	"srila-prabhupada-memories" => 	"memory_home.php",
	"mail-confirmation"			=>	"mail_confirmation.php",
	"subscribe"					=>	"subscribe-to-newsletter.php",
	"acknowledge"				=> 	"acknowledgements.php",
	"testimonials"				=> 	"testimonials.php",
	"search-results"			=> 	"search_results.php",
	"support-us"				=> 	"support-us.php",
	"share-with-us"				=> 	"share-with-us.php",
	"share-confirmation"		=>	"mail_confirmation.php",
	"support-confirmation"		=>	"mail_confirmation.php",
	"who-is-srila-prabhupada"	=>	"whois.php",
	"disappearance-lila"		=>	"disappearance-lila.php",
	"events"					=>	"events.php",
	"privacy-policy" 			=>  "privacy-policy/privacy.php",
	"prabhupada-in-south-india" 		=>  "prabhupada-in-south-india.php",
	

	/* Routes for legacy site */
	"legacysite/quotes"								 => "legacysite/menu_content_popup.php",

	);

	

	/* 20180713 - 

	

	It is observed today that REDIRECT_URL became route.php.

	So $uri became route.php and the whole logic is broken.

						

	(In intiial development of this routing engine, the actual requested URI ($uri) was taken  from REDIRECT_URL.)

	

	To fix this issue, updating all  REDIRECT_URL references to REQUEST_URI in this file.

		

	*/

		

		

	$uri = $_SERVER['REQUEST_URI'];

	

	/* This is local dev envirnment virtual host name */

	$uri = str_replace("splila/", "", $uri);

	$uri = trim($uri, "/");

	

	$_SERVER['REQUEST_URI'] = $uri;

	

	

	$paths = explode ("/",$uri);

	



	$target = $paths[0];


	if(($target == "memories-by-location") || ($target == "memories-by-devotee") || ($target == "memories-by-quality") || ($target == "memories-by-topic") ){
		header("Location: /srila-prabhupada-memories#/$uri");
	}

	 



	if(array_key_exists($target, $route))

	{
		

		$module = $route["$target"];

	

	

		$_GET['routed'] = "1";

		$_GET['q'] = $_SERVER['REQUEST_URI'];

	

	

		/* Let other files also have same view of REDIRECT_URL */

		$_SERVER['REDIRECT_URL'] = $_SERVER['REQUEST_URI'];

		

		/* A Teak for menu items */

		if($module == "menu_content_popup.php" && isset($paths[1]))

			$module = "memory_read.php";

			

		include_once "$module";

	}

	else{

		header("Location: /read/$target");

	}

?>