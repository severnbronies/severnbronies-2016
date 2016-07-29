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
	<?php 
		$counter = 0;
		foreach($posts as $post): 
			if($counter >= 10):
				break; 
			endif;
			$counter++;
			$post->profile = "";
			$post->name = "";
	?>
	<div class="social-card social-card--<?php echo $post->source; ?> <?php if(!empty($post->image)): ?>social-card--has-image<?php endif; ?> grid__item">
		<footer class="social-card__footer">
			<?php 
				switch($post->source) {
					case "twitter":
						$post->profile = "https://twitter.com/severnbronies";
						$post->name = "@severnbronies";
						break;
					case "facebook":
						$post->profile = "https://facebook.com/severnbronies";
						$post->name = "/severnbronies";
						break;
					case "tumblr":
						$post->profile = "http://blog.severnbronies.co.uk/";
						$post->name = "severnbronies";
						break;
				}
			?>
			<a class="social-card__source" href="<?php echo $post->profile; ?>"><?php echo $post->name; ?></a>
			<a class="social-card__date" href="<?php echo $post->permalink; ?>">
				<time datetime="<?php echo date("c", $post->timestamp); ?>" title="<?php echo date("c", $post->timestamp); ?>">
					<?php echo sb_fuzzy_date($post->timestamp); ?>
				</time>
			</a>
		</footer>
		<?php
			if(!empty($post->image)):
		?>
			<a class="social-card__media" href="<?php echo $post->permalink; ?>">
				<img class="social-card__image" alt="" src="<?php echo $post->image; ?>">
			</a>
		<?php
			endif;
		?>
		<div class="content social-card__body">
			<?php 
				if($post->source == "twitter" || $post->source == "facebook"):
					echo sb_content_parse($post->content); 
				else:
					echo $post->content;
				endif;
			?>
		</div>
	</div>
	<?php 
		endforeach; 
	?>
<?php 
	endif;
?>