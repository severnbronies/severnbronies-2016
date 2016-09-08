<?php
	/* 
	Template Name: Page - Home
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	$meet_query = new WP_Query(array(
		"post_type" => "meet",
		"orderby" => "meta_value",
		"order" => "ASC",
		"posts_per_page" => -1,
		"meta_key" => "meet_end_time",
		"meta_compare" => ">",
		"meta_value" => date('Y-m-d H:i:s')
	));
?>

	<main class="main page-home" id="content" role="main">
		<div class="grid page-home__grid">
			<?php 
				if($meet_query->have_posts()):
					while($meet_query->have_posts()): 
						$meet_query->the_post();
						get_template_part('partials/meet/card');
					endwhile; 
				endif;
			?>
		</div>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>