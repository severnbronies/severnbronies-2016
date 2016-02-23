<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	$meet_query = new WP_Query(array(
		"post_type" => "meet",
		"orderby" => "meta_value_num",
		"order" => "ASC",
		"posts_per_page" => "3",
		"meta_key" => "meet_end_time",
		"meta_compare" => ">",
		"meta_value" => time()
	));
?>

	<main class="main" id="content" role="main">
	<?php if($meet_query->have_posts()): ?>
		<div class="meet-grid meet-grid--homepage meet-grid--items-<?php echo $meet_query->post_count; ?> template-homepage__meet-grid">
		<?php 
			while($meet_query->have_posts()): 
				$meet_query->the_post();
				$meet_location = sb_meet_location(get_field("meet_location")); 
				$meet_coords = $meet_location["latitude"] . "," . $meet_location["longitude"];
				if(has_post_thumbnail()):
					$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), "full")[0];
				else: 
					$image_url = "//maps.googleapis.com/maps/api/staticmap?size=640x640&amp;maptype=roadmap&amp;markers=color:0xe84545%7C" . $meet_coords . "&amp;key=AIzaSyBbChsPXFcEPgXCAncMzV5FdaWc2W8_Hjk";
				endif; 
		?>
			<div class="meet-grid__item">
				<div class="meet-card">
					<h1><?php the_title(); ?></h1>
					<img alt="" src="<?php echo $image_url; ?>">
					<?php echo sb_meet_dates(get_field("meet_start_time"), get_field("meet_end_time")); ?>
					<?php echo $meet_location["address"]; ?>
				</div>
			</div>
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