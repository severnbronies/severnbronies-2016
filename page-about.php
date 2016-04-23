<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	// Meet stats
	$all_meets = new WP_Query("post_type=meet&posts_per_page=-1");
	$meet_count = $all_meets->found_posts;
	$meet_length = 0;
	while($all_meets->have_posts()) {
		$all_meets->the_post();
		$start = get_field("meet_start_time");
		$end = get_field("meet_end_time");
		$meet_length += ($end - $start);
	}
	$meet_length = round($meet_length / 60 / 60);
	// Meet categories
	$meet_categories = get_categories();
	// Meet staff
	$all_staff = new WP_Query('post_type=meet_runner&posts_per_page=-1&orderby=title&order=ASC');
	$meet_staff = array();
	if($all_staff->have_posts()) {
		while($all_staff->have_posts()) {
			$all_staff->the_post();
			if(get_field("runner_staff") == true) {
				$meet_staff[] = array(
					"name" => get_the_title(),
					"avatar" => sb_profile_avatar(get_the_ID()),
					"biography" => sb_profile_biography(get_the_ID()),
					"email" => get_field("runner_email"),
					"links" => get_field("runner_links")
				);
			}
		}
	}
	if (have_posts()) : 
		while (have_posts()) : 
			the_post();
?>

	<main class="main" id="content" role="main">
		<div class="page-about">
			<div class="page-about__media">
				<?php
					if(has_post_thumbnail()):
						echo sb_responsive_image_helper(get_post_thumbnail_id(), "page-about__image");
					endif; 
				?>
			</div>
			<div class="page-about__body">
				<section class="content page-about__section page-about__section--intro">
					<?php the_content(); ?>
				</section>
				<section class="page-about__section page-about__section--stats">
					<ul class="stats stats--large">
						<li class="stats__item">
							<strong class="stats__value" data-counter><?php echo $meet_count; ?></strong>
							<span class="stats__key">events</span>
						</li>
						<li class="stats__item">
							<strong class="stats__value" data-counter><?php echo $meet_length; ?></strong>
							<span class="stats__key">hours</span>
						</li>
						<li class="stats__item">
							<strong class="stats__value" data-counter>180</strong>
							<span class="stats__key">people<small>(ish)</small></span>
						</li>
					</ul>
				</section>
				<section class="page-about__section page-about__section--categories">
					<header class="page-about__section-header">
						<h1 class="page-about__section-title">Meets</h1>
					</header>
					<div class="page-about__section-body">
						<?php
							foreach($meet_categories as $category): 
						?>
							<div class="content">
								<strong><?php echo $category->name; ?></strong>&mdash;<?php echo $category->description; ?>
							</div>
						<?php 
							endforeach;
						?>
						<div class="content">
							Also you get a free badge and sticker when you come to your first meet!
						</div>
					</div>
				</section>
				<?php
					if(count($meet_staff) > 0):
				?>
				<section class="page-about__section page-about__section--staff">
					<header class="page-about__section-header">
						<h1 class="page-about__section-title">Brought to you by&hellip;</h1>
					</header>
					<div class="page-about__section-body">
						<?php 
							foreach($meet_staff as $staff):
						?>
							<article class="staff-card">
								<img class="staff-card__avatar" alt="" src="<?php echo $staff["avatar"]; ?>">
								<div class="staff-card__body">
									<header class="staff-card__header">
										<h1 class="staff-card__title"><?php echo $staff["name"]; ?></h1>
										<?php 
											if(!empty($staff["email"])):
										?>
											<a class="staff-card__email" href="mailto:<?php echo $staff["email"]; ?>"><?php echo $staff["email"]; ?></a>
										<?php 
											endif;
										?>
									</header>
									<div class="content staff-card__content">
										<?php echo $staff["biography"]; ?>
									</div>
								</div>
							</article>
						<?php
							endforeach;
						?>
					</div>
				</section>
				<?php
					endif;
				?>
			</div>
		</div>
	</main>

<?php
		endwhile;
	endif;
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>