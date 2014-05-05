<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'wp_enqueue_scripts', 'prefix_enqueue_mobile_js' );
/**
 * Add a script which depends on jQuery
 * to enable a responsive menu toggle.
 *
 * @author FAT Media
 * @link http://youneedfat.com/genesis-responsive-design-menu/
 *
 */
if ( ! function_exists( 'prefix_enqueue_mobile_js' ) ) {
	function prefix_enqueue_mobile_js() {
		wp_enqueue_script( 'prefix-general', get_stylesheet_directory_uri() . '/lib/js/general.js', array( 'jquery' ), '1.0.0' );
	}
}