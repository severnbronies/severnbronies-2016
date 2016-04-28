<?php 
/**
 * iCal Feed template
 */

header("Content-Type: text/calendar");
$EOL = PHP_EOL;

?>BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//SEVERN BRONIES//SEVERN BRONIES//EN
<?php 
	$posts = new WP_Query("post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=DESC");
	while($posts->have_posts()):
		$posts->the_post();
		$meet_location = sb_meet_location(get_field("meet_location"));
?>
BEGIN:VEVENT
SUMMARY:<?php the_title_rss(); ?><?php echo $EOL; ?>
UID:<?php the_permalink_rss(); ?><?php echo $EOL; ?>
DTSTART:<?php echo date("Ymd\THis\Z", get_field("meet_start_time", get_the_ID())) ?><?php echo $EOL; ?>
DTEND:<?php echo date("Ymd\THis\Z", get_field("meet_end_time", get_the_ID())) ?><?php echo $EOL; ?>
LOCATION:<?php echo $meet_location["name"]; ?>, <?php echo $meet_location["address"]; ?><?php echo $EOL; ?>
ORGANIZER;CN=Severn Bronies:MAILTO:hello@severnbronies.co.uk<?php echo $EOL; ?>
END:VEVENT
<?php 
	endwhile;
?>
END:VCALENDAR