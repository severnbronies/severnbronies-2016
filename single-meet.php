<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	if (have_posts()) : 
		while (have_posts()) : 
			the_post();
			// Runners
			$meet_runner = get_field("meet_runner");
			$meet_runners_count = (count($meet_runner) > 4) ? 4 : count($meet_runner);
			$meet_runners = array();
			foreach($meet_runner as $runner) {
				$meet_runners[] = array(
					"id" => $runner,
					"name" => get_the_title($runner),
					"avatar" => sb_profile_avatar($runner)
				);
			}
			// Location
			$meet_location = sb_meet_location(get_field("meet_location"));			
			// Media
			if(has_post_thumbnail()):
				$meet_image = sb_responsive_image_helper(get_post_thumbnail_id(), "meet__image");
				$meet_image_copyright = get_featured_image_copyright();
			else: 
				$meet_image = '<div class="meet__map" data-map="' . $meet_location["latitude"] . ',' . $meet_location["longitude"] . '"></div>';
			endif; 

?>

	<main class="main" id="content" role="main">
		<article class="meet">
			<header class="meet__header">
				<div class="meet__media">
					<?php echo $meet_image; ?>
					<?php 
						if($meet_image_copyright):
					?>
						<div class="meet__media__copyright">
							<?php echo $meet_image_copyright; ?>
						</div>
					<?php
						endif;
					?>
				</div>
				<h1 class="meet__title"><?php the_title(); ?></h1>
				<?php 
					if(time() >= get_field("meet_start_time") && time() < get_field("meet_end_time")):
				?>
				<div class="live-label meet__live"><strong class="live-label__title">Happening Now!</strong> &mdash; <a href="#">follow us on Twitter</a> for up to date information</div>
				<?php 
					endif; 
				?>
			</header>
			<div class="meet__body">
				<footer class="metadata meet__metadata">
					<div class="metadata__item metadata__item--media">
						<div class="metadata__media">
							<div class="avatar-grid avatar-grid--items-<?php echo $meet_runners_count; ?>">
								<?php 
									for($i = 0; $i < $meet_runners_count; $i++):
								?>
								<img class="avatar-grid__item" alt="<?php echo $meet_runners[$i]["name"]; ?>" src="<?php echo $meet_runners[$i]["avatar"]; ?>">
								<?php 
									endfor; 
								?>
							</div>
						</div>
						<div class="metadata__key">
							<?php echo ($meet_runners_count == 1) ? "Meet runner" : "Meet runners"; ?>
						</div>
						<div class="content metadata__value">
							<?php 
								for($i = 0; $i < count($meet_runners); $i++) {
									echo $meet_runners[$i]["name"];
									if(!empty($meet_runners[$i + 1])):
										echo ", ";
									endif;
								}
							?>
						</div>
					</div>
					<div class="metadata__item">
						<div class="metadata__key">
							Meet type
						</div>
						<div class="content metadata__value">
							<?php
								$meet_categories = sb_meet_category(get_the_ID());
								//print_r($meet_categories);
								for($i = 0; $i < count($meet_categories); $i++) {
									echo $meet_categories[$i]["name"];
									if(isset($meet_categories[$i + 1])) {
										echo ", ";
									}
								}
							?>
						</div>
					</div>
					<div class="metadata__item">
						<div class="metadata__key">
							Running time
						</div>
						<div class="content metadata__value">
							<?php echo sb_meet_dates(get_field("meet_start_time"), get_field("meet_end_time")); ?>
						</div>
					</div>
					<div class="metadata__item">
						<div class="metadata__key">
							Meeting point
						</div>
						<div class="content metadata__value">
							<?php echo $meet_location["name"]; ?>,
							<?php echo $meet_location["address"]; ?>
							(<a href="https://google.co.uk/maps/?q=<?php echo urlencode($meet_location["name"] . ", " . $meet_location["address"]); ?>" target="_blank">map</a>)
						</div>
					</div>
				</footer>
				<div class="content article meet__content">
					<?php
						if(strlen(get_the_content()) > 0):
							the_content(); 
						else:
							echo '<p><em>No meet plans announced.</em></p>';
						endif;
					?>
				</div>
			</div>
		</article>
	</main>

<?php
		endwhile;
	endif;
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>