<?php

/**
 * Plugin Name:       Pricing Card UDC
 * Description:       Pricing Card UDC Widget is created by Zain Hassan.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hz-widgets
*/

if(!defined('ABSPATH')){
    exit;
}

if ( ! defined( 'UDC_PLUGIN_ASSETS_FILE' ) ) {
	define( 'UDC_PLUGIN_ASSETS_FILE', plugins_url( 'inc/assets/', __FILE__ ) );
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_udc_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/udc-card.php' );

	$widgets_manager->register( new \Elementor_Udc_Widget() );

}
add_action( 'elementor/widgets/register', 'register_udc_widget' );

function udc_register_dependencies_scripts() {

	/* Scripts */
	wp_register_script( 'udc-card', plugins_url( 'inc/assets/js/udc-card.js', __FILE__ ));

}
add_action( 'wp_enqueue_scripts', 'udc_register_dependencies_scripts' );

