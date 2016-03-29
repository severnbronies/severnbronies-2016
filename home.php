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
					<?php 
						$posts = sb_social_feed(array(
							"twitter" => "severnbronies",
							"tumblr" => "severnbronies",
							"facebook" => "severnbronies",
							"limit" => 15
						)); 
					?>
					<aside class="social-feed">
						<h1 class="social-feed__title">Recently in the Severn Bronies&hellip;</h1>
						<ul class="social-feed__list">
							<?php 
								$counter = 0;
								foreach($posts as $post): 
									if($counter >= 10):
										break; 
									endif;
									$counter++;
							?>
							<li class="social-feed__item social-feed__item--<?php echo $post->source; ?>">
								<div class="social-feed__body">
									<?php
										if(!empty($post->image)):
									?>
									<a class="social-feed__media" href="<?php echo $post->permalink; ?>">
										<img class="social-feed__image" alt="" src="<?php echo $post->image; ?>">
									</a>
									<?php
										endif;
									?>
									<div class="content">
										<?php 
											if($post->source == "twitter" || $post->source == "facebook"):
												echo sb_content_parse($post->content); 
											else:
												echo $post->content;
											endif;
										?>
									</div>
								</div>
								<a class="social-feed__permalink" href="<?php echo $post->permalink; ?>">
									<time class="social-feed__metadata" datetime="<?php echo date("c", $post->timestamp); ?>" title="<?php echo date("c", $post->timestamp); ?>">
										<?php echo sb_fuzzy_date($post->timestamp); ?>
									</time>
								</a>
							</li>
							<?php 
								endforeach; 
							?>
						</ul>
					</aside>
				</div>
			</div>
		</article>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>