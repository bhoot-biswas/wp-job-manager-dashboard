<?php
/**
 * Plugin Name:     Dashboard for Wp Job Manager
 * Plugin URI:      https://bengal-studio.com/products/wp-job-manager-dashboard
 * Description:     A New Central Dashboard for Wp Job Manager
 * Author:          Bengal Studio
 * Author URI:      https://bengal-studio.com/
 * Text Domain:     wp-job-manager-dashboard
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WP_Job_Manager_Dashboard
 */

namespace BengalStudio\Job\Analytics;

// Your code starts here.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define constants.
define( 'WP_JOB_MANAGER_DASHBOARD_VERSION', '0.1.0' );
define( 'WP_JOB_MANAGER_DASHBOARD_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'WP_JOB_MANAGER_DASHBOARD_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
define( 'WP_JOB_MANAGER_DASHBOARD_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Require the main Wp_Job_Manager_Dashboard class.
require_once dirname( __FILE__ ) . '/includes/class-singleton.php';
require_once dirname( __FILE__ ) . '/includes/class-dashboard.php';

// Main instance of Job\Analytics\Dashboard.
function dashboard() {
	return Dashboard::get_instance();
}

// Start the plugin.
dashboard->init();
