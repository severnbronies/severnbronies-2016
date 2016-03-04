<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	$posts_count = new WP_Query($query_string . "&posts_per_page=-1");
	$posts_count = $posts_count->found_posts;
	$posts_per_page = get_option('posts_per_page');
	$current_page = get_query_var("paged") ? get_query_var("paged") : 1;
	$meet_query = new WP_Query(array(
		"post_type" => "meet",
		"orderby" => "meta_value_num",
		"order" => "ASC",
		"paged" => $current_page,
		"posts_per_page" => $posts_per_page,
		"meta_key" => "meet_end_time",
		"meta_compare" => ">",
		"meta_value" => time()
	));
?>

	<main class="main" id="content" role="main">
	<?php if($meet_query->have_posts()): ?>
		<nav class="pagination">
			<div class="pagination__title">Meet archives</div>
			<ul class="pagination__list">
				<?php 
					$iteration = 0;
					for($i = $meet_query->max_num_pages; $i > 0; $i--):
						$number_start = $posts_count - ($posts_per_page * $iteration);
						$number_end = ($number_start - $posts_per_page + 1) > 1 ? ($number_start - $posts_per_page + 1) : 1;
				?>
				<li class="pagination__item">
					<a href="?paged=<?php echo $iteration + 1; ?>" class="pagination__link<?php if($iteration + 1 == $current_page) { echo ' pagination__link--current'; } ?>">
						<?php 
							if($number_start != $number_end):
						?>
							Meets #<?php echo $number_start; ?>&ndash;<?php echo $number_end; ?>
						<?php 
							else:
						?>
							Meet #<?php echo $number_start; ?>
						<?php 
							endif; 
						?>
					</a>
				</li>
				<?php 
						$iteration++;
					endfor;
					// print_r($meet_query->max_num_pages);
				?>
			</ul>
		</nav>
		<div class="meet-grid meet-grid--grid">
		<?php 
			while($meet_query->have_posts()): 
				$meet_query->the_post();
				$meet_location = sb_meet_location(get_field("meet_location")); 
				$meet_coords = $meet_location["latitude"] . "," . $meet_location["longitude"];
				if(has_post_thumbnail()):
					$meet_image = sb_responsive_image_helper(get_post_thumbnail_id(), "meet-card__image");
				else: 
					$meet_image = '<img class="meet-card__map" alt="Map showing the location of ' . $meet_location["name"] . '." srcset="//maps.googleapis.com/maps/api/staticmap?size=320x320&amp;scale=2&amp;maptype=roadmap&amp;markers=color:0xe84545%7C' . $meet_coords . '&amp;&amp;zoom=15&amp;key=AIzaSyBbChsPXFcEPgXCAncMzV5FdaWc2W8_Hjk">';
				endif; 
		?>
			<article class="meet-card meet-grid__item">
				<a class="meet-card__link" href="<?php the_permalink(); ?>">
					<div class="meet-card__media">
						<?php echo $meet_image; ?>
					</div>
					<div class="meet-card__body">
						<h1 class="meet-card__title"><?php the_title(); ?></h1>
						<div class="meet-card__locality"><?php echo $meet_location["locality"]; ?></div>
						<ul class="meet-card__meta">
							<li class="meet-card__meta-item"><?php echo sb_meet_dates(get_field("meet_start_time")); ?></li>
						</ul>
					</div>
				</a>
			</article>
		<?php 
			endwhile; 
		?>
		</div>
	<?php endif; ?>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>