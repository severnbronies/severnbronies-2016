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
			<div class="meet-grid meet-grid--items-<?php echo $meet_query->post_count; ?> template-home__meet-grid">
			<?php 
				while($meet_query->have_posts()): 
					$meet_query->the_post();
					get_template_part('partials/meet/card');
				endwhile; 
			?>
			</div>
		<?php endif; ?>
		<article class="page template-home">
			<div class="page__body template-home__body">
				<div class="article page__content">
					<div class="content">
						<p><strong>We are the Severn Bronies.</strong> We <a href="/meet">run meets</a> for fans of My Little Pony in the south west and Wales, every single week. And it's totally awesome.</p>
					</div>
					<div class="template-home__social-feed" data-socialfeed></div>
				</div>
			</div>
		</article>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>