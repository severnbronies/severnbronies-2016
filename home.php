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
				$meet_location = sb_meet_location(get_field("meet_location")); 
				$meet_coords = $meet_location["latitude"] . "," . $meet_location["longitude"];
				if(has_post_thumbnail()):
					$meet_image = sb_responsive_image_helper(get_post_thumbnail_id(), "meet-card__image");
				else: 
					$meet_image = '<img class="meet-card__map" alt="Map showing the location of ' . $meet_location["name"] . '." srcset="//maps.googleapis.com/maps/api/staticmap?size=640x640&amp;maptype=roadmap&amp;markers=color:0xe84545%7C' . $meet_coords . '&amp;key=AIzaSyBbChsPXFcEPgXCAncMzV5FdaWc2W8_Hjk">';
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