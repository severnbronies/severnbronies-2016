<?php 

/**
 * Allow article images and image resizing
 */
add_theme_support("post-thumbnails");


/**
 * Define desired image resizes
 */
add_image_size("article-large", 1400, 9999);
add_image_size("article-medium", 1000, 9999);
add_image_size("article-small", 600, 9999);
add_image_size("banner-large", 1400, 1400, true);
add_image_size("banner-medium", 1000, 1000, true);
add_image_size("banner-small", 600, 600, true);
