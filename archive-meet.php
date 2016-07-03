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
		"order" => "DESC",
		"paged" => $current_page,
		"posts_per_page" => $posts_per_page,
		"meta_key" => "meet_end_time"
	));
?>

	<main class="main" id="content" role="main">
	<?php if($meet_query->have_posts()): ?>
		<div class="grid">
			<nav class="card grid__item">
				<div class="card__header">
					<h1 class="card__title">Meet archives</h1>
				</div>
				<div class="pagination card__body">
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
				</div>
			</nav>
			<?php 
				while($meet_query->have_posts()): 
					$meet_query->the_post();
					get_template_part('partials/meet/card');
				endwhile; 
			?>
		</div>
	<?php endif; ?>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>