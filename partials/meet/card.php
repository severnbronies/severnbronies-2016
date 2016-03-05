<?php 
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