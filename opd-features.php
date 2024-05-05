<?php
/**
 * Plugin Name:     One Perfect Dish Features
 * Plugin URI:      https://oneperfectdish.com
 * Description:     Adds a custom Location hierarchical taxonomy to the Post post Type. Adds Accent Color meta field to posts. Adds a color picker component to the Post settings Block editor sidebar and updates the post's accent color.
 * Author:          Joel Goodman
 * Author URI:      https://joelgoodman.co
 * Text Domain:     opd
 * Version:         0.1.0
 *
 * @package         OPD
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the Composer autoload file.
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require_once __DIR__ . '/includes/frontend.php';

// TODO: extend `site-title` block to support italics and formatting

// Include the Setup class.
( new OPD\Setup() )->init();
