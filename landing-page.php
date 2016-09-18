<?php
	/*
	Template Name: Page - Landing
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	if(have_posts()): 
		while(have_posts()): 
			the_post();
			$children = array();
			foreach(get_field("page_children") as $child): 
				$children[] = $child->ID;
			endforeach;
			$results = new WP_Query(array(
				"post_type" => array("page", "meet"),
				"post__in" => $children, 
				"posts_per_page" => -1,
				"orderby" => "none"
			));
?>

	<main class="main template-landing" id="content" role="main">
		<article class="template-landing__inner">
			<header class="template-landing__header">
				<h1 class="template-landing__title">
					<?php the_title(); ?>
				</h1>
			</header>
			<div class="template-landing__body">
				<div class="content template-landing__content">
					<?php the_content(); ?>
				</div>
				<div class="search-results template-landing__children">
					<ol class="search-results__list">
						<?php 
							while($results->have_posts()): 
								$results->the_post(); 
								get_template_part('partials/search/results-list');
							endwhile;
						?>
					</ol>
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