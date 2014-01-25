<?php

namespace WPUber\Loops;

use WPUber\Loops\AbstractPostsLoop as PostsLoop;

defined( 'ABSPATH' ) OR exit;

/**
 * Class NoThumbnailsLoop
 * @package WPUber\Loops
 */
class NoThumbnailsLoop extends PostsLoop
{
	/**
	 * Only process
	 * @return boolean
	 */
	public function allow()
	{
		return ! has_post_thumbnail( $this->getID() );
	}
}