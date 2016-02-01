<?php
/**
 * Atom Feed Template for displaying Atom Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('atom') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<feed
  xmlns="http://www.w3.org/2005/Atom"
  xmlns:thr="http://purl.org/syndication/thread/1.0"
  xml:lang="<?php bloginfo_rss( 'language' ); ?>"
  xml:base="<?php bloginfo_rss('url') ?>/wp-atom.php"
  <?php
  /**
   * Fires at end of the Atom feed root to add namespaces.
   *
   * @since 2.0.0
   */
  do_action( 'atom_ns' );
  ?>
 >
  <title type="text"><?php bloginfo_rss('name'); wp_title_rss(); ?></title>
  <subtitle type="text"><?php bloginfo_rss("description") ?></subtitle>

  <updated><?php echo mysql2date('Y-m-d\TH:i:s\Z', get_lastpostmodified('GMT'), false); ?></updated>

  <link rel="alternate" type="<?php bloginfo_rss('html_type'); ?>" href="<?php bloginfo_rss('url') ?>" />
  <id><?php bloginfo('atom_url'); ?></id>
  <link rel="self" type="application/atom+xml" href="<?php self_link(); ?>" />

  <?php
  /**
   * Fires just before the first Atom feed entry.
   *
   * @since 2.0.0
   */
  do_action( 'atom_head' );

  $posts = new WP_Query('post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=DESC');
  while($posts->have_posts()):
    $posts->the_post();
  ?>
  <entry>
    <title type="<?php html_type_rss(); ?>"><![CDATA[<?php the_title_rss() ?>]]></title>
    <link rel="alternate" type="<?php bloginfo_rss('html_type'); ?>" href="<?php the_permalink_rss() ?>" />
    <id><?php the_guid() ; ?></id>
    <published><?php echo date("Y-m-d\TH:i:s\Z", get_field("meet_start_time", get_the_ID())); ?></published>
    <?php the_category_rss('atom') ?>
    <summary type="<?php html_type_rss(); ?>"><![CDATA[<?php the_excerpt_rss(); ?>]]></summary>
<?php if(!get_option('rss_use_excerpt')): ?>
    <content type="<?php html_type_rss(); ?>" xml:base="<?php the_permalink_rss() ?>"><![CDATA[<?php the_content_feed('atom') ?>]]></content>
<?php endif; ?>
  <?php atom_enclosure();
  /**
   * Fires at the end of each Atom feed item.
   *
   * @since 2.0.0
   */
  do_action( 'atom_entry' );
    ?>
  </entry>
  <?php endwhile; ?>
</feed>
