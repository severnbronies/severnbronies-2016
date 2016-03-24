<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	if (have_posts()) : 
		while (have_posts()) : 
			the_post();			
?>

	<main class="main" id="content" role="main">
		<article class="page">
			<div class="page__media">
				<?php
					if(has_post_thumbnail()):
						echo sb_responsive_image_helper(get_post_thumbnail_id(), "page__image");
					endif; 
				?>
			</div>
			<div class="page__body">
				<header class="page__header">
					<h1 class="page__title"><?php the_title(); ?></h1>
					<div class="page__modified">
						Last modified:
						<time datetime="<?php the_modified_date("c"); ?>"><?php the_modified_date("jS F Y; g:ia"); ?></time>
					</div>
				</header>
				<div class="content article page__content">
					<?php the_content(); ?>
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