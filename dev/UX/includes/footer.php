	<footer class="l-desktop-width">
		<div>
			<h2>Help</h2>
			<ul class="help-list">
				<li>
					<a href="#">How It Works</a>
				</li>
				<li>
					<a href="#">How We Protect You</a>
				</li>
				<li>
					<a href="#">Export Transactions</a>
				</li>
				<li>
					<a href="#">Privacy Policy</a>
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
					<a href="google.com">Register</a>
				</li>
				<li>
					<a href="#">Log In</a>
				</li>
				<li>
					<a href="#">Add Your Service</a>
				</li>
				<li>
					<a href="#">Request a Service</a>
				</li>
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