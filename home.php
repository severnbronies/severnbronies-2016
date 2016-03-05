<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	$meet_query = new WP_Query(array(
		"post_type" => "meet",
		"orderby" => "meta_value_num",
		"order" => "ASC",
		"posts_per_page" => 3,
		"meta_key" => "meet_end_time",
		"meta_compare" => ">",
		"meta_value" => time()
	));
?>

	<main class="main" id="content" role="main">
	<?php if($meet_query->have_posts()): ?>
		<div class="meet-grid meet-grid--items-<?php echo $meet_query->post_count; ?> template-homepage__meet-grid">
		<?php 
			while($meet_query->have_posts()): 
				$meet_query->the_post();
				get_template_part('partials/meet/card');
			endwhile; 
		?>
		</div>
	<?php endif; ?>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>