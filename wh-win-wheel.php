<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://websitehill.com/about-us/
 * @since             1.0.0
 * @package           Wh_Win_Wheel
 *
 * @wordpress-plugin
 * Plugin Name:       Wh Win Wheel
 * Plugin URI:        https://websitehill.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Jacek Gajewski
 * Author URI:        https://websitehill.com/about-us/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wh-win-wheel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WH_WIN_WHEEL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wh-win-wheel-activator.php
 */
function activate_wh_win_wheel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wh-win-wheel-activator.php';
	Wh_Win_Wheel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wh-win-wheel-deactivator.php
 */
function deactivate_wh_win_wheel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wh-win-wheel-deactivator.php';
	Wh_Win_Wheel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wh_win_wheel' );
register_deactivation_hook( __FILE__, 'deactivate_wh_win_wheel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wh-win-wheel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wh_win_wheel() {

	$plugin = new Wh_Win_Wheel();
	$plugin->run();

}
run_wh_win_wheel();
