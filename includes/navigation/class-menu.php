<?php
namespace BengalStudio\Job\Analytics;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Menu.
 */
class Menu extends Singleton {
	/**
	 * Store menu items.
	 *
	 * @var array
	 */
	protected static $menu_items = array();

	/**
	 * Initialize.
	 * @return [type] [description]
	 */
	public function init() {

	}

	/**
	 * Get registered menu items.
	 *
	 * @return array
	 */
	public static function get_items() {
		return apply_filters( 'job_analytics_navigation_menu_items', self::$menu_items );
	}
}
