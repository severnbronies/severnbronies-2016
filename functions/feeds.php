<?php 

/**
 * Meet RSS feeds
 */
function sb_meet_feed_rss2($for_comments) {
	$rss_template = get_template_directory() . "/feeds/feed-meet-rss2.php";
	if(get_query_var("post_type") == "meet" && file_exists($rss_template)) {
		load_template($rss_template);
	}
	else {
		do_feed_rss2($for_comments); 
	}
}
remove_all_actions("do_feed_rss2");
add_action("do_feed_rss2", "sb_meet_feed_rss2", 10, 1);

function sb_meet_feed_rss($for_comments) {
	$rss_template = get_template_directory() . "/feeds/feed-meet-rss.php";
	if(get_query_var("post_type") == "meet" && file_exists($rss_template)) {
		load_template($rss_template);
	}
	else {
		do_feed_rss2($for_comments); 
	}
}
remove_all_actions("do_feed_rss");
add_action("do_feed_rss", "sb_meet_feed_rss", 10, 1);

function sb_meet_feed_atom($for_comments) {
	$atom_template = get_template_directory() . "/feeds/feed-meet-atom.php";
	if(get_query_var("post_type") == "meet" && file_exists($atom_template)) {
		load_template($atom_template);
	}
	else {
		do_feed_rss2($for_comments); 
	}
}
remove_all_actions("do_feed_atom");
add_action("do_feed_atom", "sb_meet_feed_atom", 10, 1);

function sb_meet_feed_rdf($for_comments) {
	$rdf_template = get_template_directory() . "/feeds/feed-meet-rdf.php";
	if(get_query_var("post_type") == "meet" && file_exists($rdf_template)) {
		load_template($rdf_template);
	}
	else {
		do_feed_rss2($for_comments); 
	}
}
remove_all_actions("do_feed_rdf");
add_action("do_feed_rdf", "sb_meet_feed_rdf", 10, 1);
