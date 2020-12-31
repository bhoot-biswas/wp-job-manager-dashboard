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
	protected static $menu_items = [];

	/**
	 * Registered callbacks or URLs with migration boolean as key value pairs.
	 *
	 * @var array
	 */
	protected static $callbacks = [];

	/**
	 * Initialize.
	 * @return [type] [description]
	 */
	public function init() {

	}

	/**
	 * Adds a menu item to the navigation.
	 *
	 * @param array $args Array containing the necessary arguments.
	 *    $args = array(
	 *      'id'              => (string) The unique ID of the menu item. Required.
	 *      'title'           => (string) Title of the menu item. Required.
	 *      'parent'          => (string) Parent menu item ID.
	 *      'capability'      => (string) Capability to view this menu item.
	 *      'url'             => (string) URL or callback to be used. Required.
	 *      'order'           => (int) Menu item order.
	 *      'migrate'         => (bool) Whether or not to hide the item in the wp admin menu.
	 *      'menuId'          => (string) The ID of the menu to add the item to.
	 *      'matchExpression' => (string) A regular expression used to identify if the menu item is active.
	 *    ).
	 */
	private static function add_item( $args ) {
		if ( ! isset( $args['id'] ) ) {
			return;
		}

		if ( isset( self::$menu_items[ $args['id'] ] ) ) {
			error_log(  // phpcs:ignore
				sprintf(
					/* translators: 1: Duplicate menu item path. */
					esc_html__( 'You have attempted to register a duplicate item with navigation: %1$s', 'woocommerce-admin' ),
					'`' . $args['id'] . '`'
				)
			);
			return;
		}

		$defaults           = array(
			'id'         => '',
			'title'      => '',
			'capability' => 'manage_job',
			'url'        => '',
			'order'      => 100,
			'migrate'    => true,
			'menuId'     => 'primary',
		);
		$menu_item          = wp_parse_args( $args, $defaults );
		$menu_item['title'] = wp_strip_all_tags( wp_specialchars_decode( $menu_item['title'] ) );
		$menu_item['url']   = self::get_callback_url( $menu_item['url'] );

		if ( ! isset( $menu_item['parent'] ) ) {
			$menu_item['parent'] = 'job-analytics';
		}

		$menu_item['menuId'] = self::get_item_menu_id( $menu_item );

		self::$menu_items[ $menu_item['id'] ] = $menu_item;

		if ( isset( $args['url'] ) ) {
			self::$callbacks[ $args['url'] ] = $menu_item['migrate'];
		}
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
