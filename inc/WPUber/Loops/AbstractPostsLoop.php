<?php

namespace WPUber\Loops;

defined( 'ABSPATH' ) OR exit;

/**
 * Class AbstractPostsLoop
 * @package WPUber\Loops
 */
abstract class AbstractPostsLoop extends \FilterIterator implements \Countable
{
	protected $wp_query;

	protected $allowed = FALSE;

	protected $total = 0;

	protected $counter = 0;

	/**
	 * @param \Iterator $iterator
	 * @param \WP_Query $wp_query
	 */
	public function __construct( \Iterator $iterator, \WP_Query $wp_query )
	{
		# Setup properties
		// Global main query object
		NULL === $this->wp_query AND $this->wp_query = $wp_query;
		// Posts for this request
		$this->total = $this->wp_query->query_vars['posts_per_page'];
		// Internal counter
		0 !== $this->counter AND $this->counter = 0;

		$this->allowed = $this->wp_query->have_posts();

		parent::__construct( $iterator );
	}

	/**
	 * @return bool
	 */
	public function accept()
	{
		if (
			! $this->allowed
			OR ! $this->current() instanceof \WP_Post
		)
			return FALSE;

		$this->wp_query->the_post();

		$this->wp_query->current_post === $this->total -1
			AND $this->wp_query->rewind_posts();

		if ( ! $this->allow() )
			return FALSE;

		$this->counter++;
		return TRUE;
	}

	/**
	 * Helper function to retrieve the ID of the currently looped post.
	 * @return int
	 */
	public function getID()
	{
		return $this->current()->ID;
	}

	/**
	 * Needs to be defined in extending class.
	 * Use this method to define the Conditional that define if we want a post.
	 * @return boolean
	 */
	abstract public function allow();

	/**
	 * @return int
	 */
	public function count()
	{
		return $this->counter;
	}
}