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
	public function __construct() {
		Menu::get_instance()->init();
	}
}
