<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
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
		$meet_image = sb_responsive_image_helper(get_post_thumbnail_id(), "hero__image");
	else: 
		$meet_image = '<div class="hero__map" data-map="' . $meet_location["latitude"] . ',' . $meet_location["longitude"] . '"></div>';
	endif; 
?>

	<main class="main" id="content" role="main">
		<article class="article article--meet">
			<header class="hero article__header">
				<div class="hero__media">
					<?php echo $meet_image; ?>
				</div>
				<div class="hero__body">
					<h1 class="hero__title"><?php the_title(); ?></h1>
					<?php 
						if(time() >= get_field("meet_start_time") && time() < get_field("meet_end_time")):
					?>
				<div class="hero__live">Happening Now! <span>&mdash; <a href="#">follow us on Twitter</a> for up to date information</span></div>
					<?php 
						endif; 
					?>
					<ul class="metadata hero__metadata">
						<li class="metadata__item metadata__item--media">
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
							<div class="metadata__value">
								<?php 
									for($i = 0; $i < count($meet_runners); $i++) {
										echo $meet_runners[$i]["name"];
										if(!empty($meet_runners[$i + 1])):
											echo ", ";
										endif;
									}
								?>
							</div>
						</li>
						<li class="metadata__item">
							<div class="metadata__key">
								Running time
							</div>
							<div class="metadata__value">
								<?php echo sb_meet_dates(get_field("meet_start_time"), get_field("meet_end_time")); ?>
							</div>
						</li>
						<li class="metadata__item">
							<div class="metadata__key">
								Meeting point
							</div>
							<div class="metadata__value">
								<?php echo $meet_location["name"]; ?>,
								<?php echo $meet_location["address"]; ?>
							</div>
						</li>
					</ul>
				</div>
			</header>
			<div class="article__body">

			</div>
		</article>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>