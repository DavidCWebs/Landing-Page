<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Carawebs_Plugin_Boilerplate
 *
 * @wordpress-plugin
 * Plugin Name:       LandingPage
 * Plugin URI:        http://example.com/LandingPage-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       LandingPage
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Autoload all the NEW classes: `Castleview\Directory\Class_Name`
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in Carawebs\LandingPage\LandingPage-activator.php
 */
function activate_LandingPage() {

	Carawebs\LandingPage\Includes\Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in Carawebs\LandingPage\LandingPage-deactivator.php
 */
function deactivate_LandingPage() {

	Carawebs\LandingPage\Includes\Deactivator::deactivate();

}

register_activation_hook( __FILE__, 'activate_LandingPage' );
register_deactivation_hook( __FILE__, 'deactivate_LandingPage' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_LandingPage() {

	$plugin = new Carawebs\LandingPage\Includes\LandingPage();
	$plugin->run();

}
run_LandingPage();
