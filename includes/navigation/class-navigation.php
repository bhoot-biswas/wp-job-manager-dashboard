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

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueue scripts.
	 * @return [type] [description]
	 */
	public function enqueue_scripts() {
		wp_localize_script(
			'wp-job-manager-dashboard',
			'frontend_ajax_object',
			dashboard()->navigation->menu::get_items()
		);
	}
}
