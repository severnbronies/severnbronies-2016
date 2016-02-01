<?php
/**
 * iCal Feed Template
 */

header('Content-Type: text/calendar');
$EOL = PHP_EOL;

?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//BRISTOL BRONIES LTD//BRISTOL BRONIES//EN
<?php
  $posts = new WP_Query('post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=DESC');
  while($posts->have_posts()): $posts->the_post(); 
    $runners = get_field('meet_runner');
    $meet_runners = "";
    for($i = 0; $i < count($runners); $i++):
      $meet_runners .= get_the_title($runners[$i]);
      if(!empty($runners[$i+1])): $meet_runners .= ", "; endif;
    endfor;
?>
BEGIN:VEVENT
SUMMARY:<?php the_title_rss() ?><?php echo $EOL; ?>
UID:<?php the_permalink_rss() ?><?php echo $EOL; ?>
DTSTART:<?php echo date("Ymd\THis\Z", get_field("meet_start_time", get_the_ID())); ?><?php echo $EOL; ?>
DTEND:<?php echo date("Ymd\THis\Z", get_field("meet_end_time", get_the_ID())); ?><?php echo $EOL; ?>
LOCATION:<?php echo bb_meet_location(get_field('meet_location')); ?><?php echo $EOL; ?>
ORGANIZER;CN=<?php echo $meet_runners; ?><?php ?><?php echo $EOL; ?>
END:VEVENT
<?php
  endwhile;
?>
END:VCALENDAR