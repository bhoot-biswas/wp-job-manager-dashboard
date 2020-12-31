<?php
namespace BengalStudio\Job\Analytics;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Navigation.
 */
class Navigation extends Singleton {
	/**
	 * Constructor.
	 */
	protected function __construct() {
		// Init classes.
		$this->menu = Menu::get_instance();
	}
}
