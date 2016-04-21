<?php 
	/*
	Template Name: Social feed
	*/
	if(function_exists("sb_social_feed")):
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
<?php 
	endif;
?>