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

	<main class="main page-home" id="content" role="main">
		<div class="grid page-home__grid">
			<article class="card grid__item page-home__intro">
				<header class="card__header">
					<h1 class="card__title">We are the Severn&nbsp;Bronies.</h1>
				</header>
				<div class="content card__body">
					<p>We <a href="/meet">run meets</a> for fans of My Little Pony in the south west and Wales, every single week. And it's totally awesome.</p>
				</div>
			</article>
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