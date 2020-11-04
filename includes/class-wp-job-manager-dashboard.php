<?php
/**
 * File containing the class WP_Job_Manager_Dashboard.
 *
 * @package WP_Job_Manager_Dashboard
 */

namespace BengalStudio;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Handles core plugin hooks and action setup.
 * @var [type]
 */
final class WP_Job_Manager_Dashboard {

	/**
	 * The single instance of the class.
	 * @var [type]
	 */
	private static $instance = null;

	/**
	 * Ensures only one instance of WP_Job_Manager_Dashboard is loaded or can be loaded.
	 * @return [type] [description]
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * WP_Job_Manager_Dashboard Constructor.
	 */
	public function __construct() {
		// Actions.
		add_action( 'after_setup_theme', [ $this, 'include_template_functions' ], 11 );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	/**
	 * Loads plugin's core helper template functions.
	 */
	public function include_template_functions() {
		include_once WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/wp-job-manager-dashboard-functions.php';
		include_once WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/wp-job-manager-dashboard-template.php';
	}

	/**
	 * Register scripts.
	 * @return [type] [description]
	 */
	public function register_scripts() {
		$asset_file = include( WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/build/index.asset.php' );

		wp_register_script(
			'wp-job-manager-dashboard',
			WP_JOB_MANAGER_DASHBOARD_PLUGIN_URL . '/build/index.js',
			$asset_file['dependencies'],
			$asset_file['version']
		);

		wp_register_style(
			'wp-job-manager-dashboard',
			WP_JOB_MANAGER_DASHBOARD_PLUGIN_URL . '/build/index.css',
			[],
			$asset_file['version']
		);
	}

}

WP_Job_Manager_Dashboard::instance();
