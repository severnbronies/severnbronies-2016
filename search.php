<?php
	/*
	Template Name: Search
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	$results = new WP_Query($query_string . "&posts_per_page=-1");
?>

	<main class="main" id="content" role="main">
		<div class="search" data-search>
			<h1 class="search__title">Search <?php bloginfo("sitename"); ?></h1>
			<?php
				get_search_form(true); 
				if($results->have_posts()):
			?>
				<div class="search-results search__results">
					<ol class="search-results__list" data-search-results>
						<?php
							while($results->have_posts()): 
								$results->the_post(); 
						?>
						<li class="search-results__item">
							<a class="search-results__link" href="<?php the_permalink(); ?>">
								<h2 class="search-results__title">
									<?php echo sb_search_highlight(get_search_query(), get_the_title()); ?>
								</h2>
								<div class="content search-results__content">
									<?php echo sb_search_highlight(get_search_query(), get_the_excerpt()); ?>
								</div>
								<div class="search-results__url">
									<?php echo get_permalink(); ?>
								</div>
							</a>
						</li>
						<?php
							endwhile;
						?>
					</ol>
				</div>
			<?php
				else:
			?>
				Nothing :(
			<?php
				endif; 
			?>
		</div>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>