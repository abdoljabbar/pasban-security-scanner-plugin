<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/abdoljabbar
 * @since             1.0.0
 * @package           Pasban_Security_Scanner
 *
 * @wordpress-plugin
 * Plugin Name:       Pasban Security Scanner
 * Plugin URI:        https://github.com/abdoljabbar/pasban-security-scanner-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Abdoljabbar Bakhsahnde
 * Author URI:        https://github.com/abdoljabbar
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pasban-security-scanner
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
define( 'PASBAN_SECURITY_SCANNER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pasban-security-scanner-activator.php
 */
function activate_pasban_security_scanner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pasban-security-scanner-activator.php';
	Pasban_Security_Scanner_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pasban-security-scanner-deactivator.php
 */
function deactivate_pasban_security_scanner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pasban-security-scanner-deactivator.php';
	Pasban_Security_Scanner_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pasban_security_scanner' );
register_deactivation_hook( __FILE__, 'deactivate_pasban_security_scanner' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pasban-security-scanner.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pasban_security_scanner() {

	$plugin = new Pasban_Security_Scanner();
	$plugin->run();

}
run_pasban_security_scanner();

// run autoloader
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';