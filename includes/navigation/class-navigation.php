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
		// Classes.
		$this->menu = Menu::get_instance();
	}

	/**
	 * Initialize.
	 */
	public function init() {
		// Init classes.
		$this->menu->init();
	}
}
