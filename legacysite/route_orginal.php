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


	/* New Menus */
	"srila-prabhupada-illustrated-biography_test"	=> "menu_content_popup_test2.php",

	"quotes_test"								 	=> "quotes_test.php",

	"quick-facts_test"							 	=> "menu_content_popup_test2.php",



	"srila-prabupada-rare-pictures_test" 		 	=> "quotes_test.php",

	"voyage-of-compassion_test" 		 			=> "menu_content_popup_test3.php",

	"srila-prabhupada-analogies_test" 		 	 	=> "srila-prabhupada-analogies_test.php",

	"eulogies-by-eminent_test" 		 	 		 	=> "menu_content_popup_test2.php",

	"predictions_test" 		 	 		 		 	=> "menu_content_popup_test2.php",

	"poetry-by-prabhupada_test" 		 	 		=> "menu_content_popup_test2.php",

	"poetry-for-prabhupada_test" 		 	 	 	=> "menu_content_popup_test2.php",

	"test"											=> "index_test.php",

		/* New Menus */
	"testimonials"	=> "newsite/testimonials.php",

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

		header("Location: /");

	}

?>