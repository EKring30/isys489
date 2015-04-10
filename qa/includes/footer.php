	<!--This footer file was supplied to the ISYS 489 class as part of the prototype.  It has been modified to add functionality.
	Those who have modified it should not those changes near the area where they were made-->
	<footer class="l-desktop-width">
		<div>
			<h2>Help</h2>
			<!--links to php pages added by: Eric Siegel-->
			<ul class="help-list">
				<li>
					<a href="howItWorks.php">How It Works</a>
				</li>
				<li>
					<a href="howWeProtectYou.php">How We Protect You</a>
				</li>
				<li>
					<a href="exportTransactions.php">Export Transactions</a>
				</li>
				<li>
					<a href="privacyPolicy.php">Privacy Policy</a>
				</li>
			</ul>
		</div>
		<div>
			<h2>Categories</h2>
			<ul class="categories-list is-hidden-mobile">
				<li>
					<a href="#">Automotive</a>
				</li>
				<li>
					<a href="#">Beauty</a>
				</li>
				<li>
					<a href="#">Construction &amp; Repair</a>
				</li>
				<li>
					<a href="#">Creative</a>
				</li>
				<li>
					<a href="#">Education</a>
				</li>
			</ul>
		</div>
		<div>
			<h2 class="is-hidden-mobile">Categories</h2>
			<ul class="categories-list is-hidden-mobile">
				<li>
					<a href="#">Financial</a>
				</li>
				<li>
					<a href="#">House &amp; Yard</a>
				</li>
				<li>
					<a href="#">Legal</a>
				</li>
				<li>
					<a href="#">Personal</a>
				</li>
				<li>
					<a href="#">Technical</a>
				</li>
			</ul>
		</div>
		<div>
			<h2>Swap</h2>
			<ul class="swap-list is-hidden-mobile">
				<li>
					<a href="signup.php">Register</a>
				</li>
				<li>
					<a href="loginForm.php">Log In</a>
				</li>
				<li>
					<a href="postsJobForm.php">Add Your Service</a>
				</li>
				<!--This is opening the next page in a separate and smaller window rather than changing pages I (Eric Siegel) found this code on stackoverflow.com
				and integrated it into the footer supplied by the UX team-->
				<li>
					<script type="text/javascript">
					<!--
					function MM_openBrWindow(theURL,winName,features) { //v2.0
					window.open(theURL,winName,features);}
					//-->
					</script>
					<a href="posts_service.php" onclick="MM_openBrWindow('http://grserviceswap.isys489.com/dev/eric/posts_service.php',
					'GR Service Swap', 'menubar=no,status=no,scrollbars=no,titlebar=no,resizable=no,top=150,left=400,width=550,height=550'); return false;">
					Request a Service</a>
				</li>
				<!--End of opening the next page in a separate and smaller window-->
			</ul>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/main.js"></script>
	<script type="text/javascript">
		$('.carousel').slick({
		  //dots: true,
		    infinite: false,
		    speed: 300,
		    slidesToShow: 4,
		    slidesToScroll: 4,
		    responsive: [
		      {
		        breakpoint: 1024,
		        settings: {
		          slidesToShow: 3,
		          slidesToScroll: 3,
		          infinite: true
		        }
		      },
		      {
		        breakpoint: 600,
		        settings: {
		          slidesToShow: 2,
		          slidesToScroll: 2
		        }
		      },
		      {
		        breakpoint: 480,
		        settings: {
		          slidesToShow: 1,
		          slidesToScroll: 1
		        }
		      }
		      // You can unslick at a given breakpoint now by adding:
		      // settings: "unslick"
		      // instead of a settings object
		    ]
		});
	</script>
</body>
</html>