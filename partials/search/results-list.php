<?php
	if(get_post_type() == "meet"):
		$meet_location = sb_meet_location(get_field("meet_location")); 
		$meet_theme = !empty($meet_location["locality"]) ? strtolower($meet_location["locality"]) : "severn";
?>
	<li class="search-results__item" data-theme="<?php echo $meet_theme; ?>">
		<a class="search-results__link" href="<?php the_permalink(); ?>">
			<?php 
				if(has_post_thumbnail()):
			?>
				<img class="search-results__image" alt="" src="<?php echo the_post_thumbnail_url('search-result'); ?>">
			<?php
				endif;
			?>
			<div class="search-results__body">
				<div class="search-results__type">
					Meet
				</div>
				<h2 class="search-results__title">
					<?php echo sb_search_highlight(get_search_query(), get_the_title()); ?>
				</h2>
				<div class="content search-results__content">
					<p>
						<strong>
							<?php echo $meet_location["locality"]; ?>
							&middot;
							<?php echo sb_meet_dates(get_field("meet_start_time"), get_field("meet_end_time")); ?>
						</strong><br>
						<?php echo sb_search_highlight(get_search_query(), get_the_excerpt()); ?>
					</p>
				</div>
			</div>
		</a>
	</li>
	<?php 
		else:
	?>
	<li class="search-results__item">
		<a class="search-results__link" href="<?php the_permalink(); ?>">
			<?php 
				if(has_post_thumbnail()):
					echo sb_responsive_image_helper(get_post_thumbnail_id(), "search-results__image");
				endif;
			?>
			<div class="search-results__body">
				<div class="search-results__type">
					Page
				</div>
				<h2 class="search-results__title">
					<?php echo sb_search_highlight(get_search_query(), get_the_title()); ?>
				</h2>
				<div class="content search-results__content">
					<p><?php echo sb_search_highlight(get_search_query(), get_the_excerpt()); ?></p>
				</div>
			</div>
		</a>
	</li>
<?php
	endif;
?>