<?php

use WPUber\Loops\ThumbnailsLoop as Thumbs,
	WPUber\Loops\NoThumbnailsLoop as NoThumbs;

global $wp_query;

get_header();

# 1st Loop: Thumbnails only
foreach ( new Thumbs( getUberQuery(), $wp_query ) as $post )
{
	the_post_thumbnail();
	the_title( '<h2>', '</h2>' );
}

# 2nd Loop: No Thumbnails
foreach ( new NoThumbs( getUberQuery(), $wp_query ) as $post )
{
	the_title( '<h2>', '</h2>' );
	the_excerpt();
}

get_footer();