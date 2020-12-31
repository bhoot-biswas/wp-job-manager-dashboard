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
	 * Initialize.
	 * @return [type] [description]
	 */
	public function init() {
		// Init classes.
		$this->menu = Menu::get_instance();
		$this->menu->init();
	}
}
