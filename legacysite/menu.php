<?php


	if(session_status() == PHP_SESSION_NONE)
		die();

	
?>


		<!-- Menu Bar -->
		<div class="sliding--menu__wrapper slide--right">
			<input type="checkbox" id="navigation" />        
			<label id="hamburger--icon" for="navigation">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</label>
			<nav>
				<ul>
					<li class="site-logo"></li>
					<!--
					<li class="lock-menu">
						<div class="profile-block">
							Welcome<span>Madhupandita Dasa</span>
						</div>
					</li>
					-->
					<li>
						<a href="/">Home</a>
						<!-- <a href="/">Dashboard</a> -->
						<!-- <a href="#">Know Prabhupada</a> -->
						<a href="/srila-prabhupada-memories">Memories</a>
						
						<!-- <a href="#">Share with us</a> -->
						
						<a href="/legacysite/quotes">Quotes</a>
						<a href="/srila-prabhupada-analogies">Prabhupada Analogies</a>
						<a href="/srila-prabhupada-illustrated-biography">Illustrated Biography</a>
						<a href="/srila-prabupada-rare-pictures">Rare Pictures</a>
						
						<a href="/acknowledge">Acknowledgements</a>
						
						
						<a href="/eulogies-by-eminent">Eulogies By Eminent</a>
						<a href="/predictions">Predictions</a>
						<a href="/quick-facts">Quick Facts</a>
						<a href="/voyage-of-compassion">Voyage Of Compassion</a>
						
						<!-- <a href="#">108 Temples</a> -->
						
						<a href="/poetry-by-prabhupada">Poetry by Prabhupada</a>
						<a href="/poetry-for-prabhupada">Poetry for Prabhupada</a>
						<!-- <a href="#">Videos</a> -->
						<!-- <a href="#">Change Password</a> -->
						
						<!-- <a href="#">Logout</a> -->
						
					</li>
				</ul>
			</nav>			
			<div class="obfuscator">
			</div>        
		</div>		