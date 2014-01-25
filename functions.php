<?php

use WPUber\Loops\ThumbnailFilter;

defined( 'ABSPATH' ) OR exit;

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', 'themeSetup' );
function themeSetup()
{
	include_once plugin_dir_path( __FILE__ )."vendor/autoload.php";
}


/**
 * Returns the main Query as ArrayIterator.
 * Use this function to feed your PostIterator. Then loop it.
 * @return \ArrayIterator
 */
function getUberQuery()
{
	global $wp_query;

	$arrayObj = new \ArrayObject( $wp_query->get_posts() );

	return $arrayObj->getIterator();
}