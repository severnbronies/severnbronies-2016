	<ul class="accessibility-links">
		<li><a href="#top">Jump to the top of the page</a></li>
	</ul>

	<!-- Postload JavaScript -->
	<script>
		WebFontConfig = {
			google: {
				families: ['Montserrat:400']
			}
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>
	<script src="<?php echo sb_asset("js/vendor.js"); ?>"></script>
	<script src="<?php echo sb_asset("js/scripts.js"); ?>"></script>

	<?php 
		if(defined("GOOGLE_ANALYTICS_ID")):
	?>
	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', '<?php echo GOOGLE_ANALYTICS_ID; ?>', 'auto');
		ga('send', 'pageview');
	</script>
	<?php
		endif;
	?>

	<!-- Injected stuff -->
	<?php wp_footer(); ?> 

</body>
</html>
