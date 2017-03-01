<?php

/**
 * @link              http://example.com
 * @since             1.0.0
 * @package           Quotelist
 *
 * @wordpress-plugin
 * Plugin Name:       Quotelist
 * Plugin URI:        http://example.com/quotelist-uri/
 * Description:       Product catalog and request a quote functionality for WordPress.
 * Version:           1.0.0
 * Author:            James Kemp
 * Author URI:        http://jckemp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       quotelist
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-quotelist-activator.php
 */
function activate_quotelist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quotelist-activator.php';
	Quotelist_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-quotelist-deactivator.php
 */
function deactivate_quotelist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quotelist-deactivator.php';
	Quotelist_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_quotelist' );
register_deactivation_hook( __FILE__, 'deactivate_quotelist' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-quotelist.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_quotelist() {

	$plugin = new Quotelist();
	$plugin->run();

}

run_quotelist();
