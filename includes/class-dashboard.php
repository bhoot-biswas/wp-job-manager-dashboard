<?php
/**
 * File containing the class WP_Job_Manager_Dashboard.
 *
 * @package WP_Job_Manager_Dashboard
 */

namespace BengalStudio\Job\Analytics;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Handles core plugin hooks and action setup.
 * @var [type]
 */
final class Dashboard extends Singleton {
	/**
	 * Constructor.
	 */
	public function __construct() {
		// Includes.
		include_once WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/includes/navigation/class-menu.php';
		include_once WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/includes/navigation/class-navigation.php';

		// Classes.
		$this->navigation = Navigation::get_instance();
	}

	/**
	 * Initialize.
	 * @return [type] [description]
	 */
	public function init() {
		// Hooks.
		add_action( 'after_setup_theme', [ $this, 'include_template_functions' ], 11 );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		add_filter( 'template_include', [ $this, 'dashboard_page_template' ], 99 );
		add_filter( 'show_admin_bar', [ $this, 'show_admin_bar' ] );

		// Init classes.
		$this->navigation->init();
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
			$asset_file['version'],
			true
		);

		wp_register_style(
			'wp-job-manager-dashboard',
			WP_JOB_MANAGER_DASHBOARD_PLUGIN_URL . '/build/index.css',
			[],
			$asset_file['version']
		);

		wp_enqueue_script( 'wp-job-manager-dashboard' );
		wp_enqueue_style( 'wp-job-manager-dashboard' );
	}

	/**
	 * [dashboard_page_template description]
	 * @param  [type] $template [description]
	 * @return [type]           [description]
	 */
	public function dashboard_page_template( $template ) {
		if ( is_page( 'dashboard' ) && file_exists( WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/templates/dashboard.php' ) ) {
			return WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR . '/templates/dashboard.php';
		}

		return $template;
	}

	/**
	 * [show_admin_bar description]
	 * @return [type] [description]
	 */
	public function show_admin_bar() {
		if ( is_page( 'dashboard' ) ) {
			return false;
		}

		return true;
	}

}
