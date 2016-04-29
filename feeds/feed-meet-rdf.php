<?php 

header("Content-Type: " . feed_content_type("rdf") . "; charset=" . get_option("blog_charset"), true);
$posts = new WP_Query("post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=DESC");
echo '<?xml version="1.0" encoding="' . get_option("blog_charset") . '"?>';
?>

<rdf:RDF 
	xmlns="http://purl.org/rss/1.0/"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:admin="http://webns.net/mvcb/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<?php do_action("rdf_ns"); ?>
	<channel rdf:about="<?php bloginfo_rss("url"); ?>">
		<title><?php wp_title_rss(); ?></title>
		<link><?php bloginfo_rss("url"); ?></link>
		<description><?php bloginfo_rss("description"); ?></description>
		<dc:date><?php echo mysql2date("Y-m-d\TH:i:s\Z", get_lastpostmodified("GMT"), false); ?></dc:date>
		<sy:updatePeriod><?php echo apply_filters("rss_update_period", "hourly"); ?></sy:updatePeriod>
		<sy:updateFrequency><?php echo apply_filters("rss_update_frequency", "1"); ?></sy:updateFrequency>
		<sy:updateBase>2000-01-01T12:00:00+00:00</sy:updateBase>
		<?php do_action("rdf_header"); ?>
		<items>
			<rdf:Seq>
<?php 
	while($posts->have_posts()): 
		$posts->the_post();
?>
				<rdf:li rdf:resource="<?php the_permalink_rss(); ?>" />
<?php 
	endwhile;
?>
			</rdf:Seq>
		</items>
	</channel>
<?php 
	while($posts->have_posts()):
		$posts->the_post();
?>
	<item rdf:about="<?php the_permalink_rss(); ?>">
		<title><?php the_title_rss(); ?></title>
		<link><?php the_permalink_rss(); ?></link>
		<dc:date><?php echo date("Y-m-d\TH:i:s\Z", get_field("meet_start_time", get_the_ID())); ?></dc:date>
<?php 
	the_category_rss("rdf");
	if(get_option("rss_use_excerpt")):
?>
		<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
<?php
	else:
?>
		<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
		<content:encoded><![CDATA[<?php the_content_feed("rdf"); ?>]]></content:encoded>
<?php
	endif;
	do_action("rdf_item");
?>
	</item>
<?php 
	endwhile;
?>
</rdf:RDF>