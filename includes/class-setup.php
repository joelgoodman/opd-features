<?php
namespace OPD;

/**
 * Class Setup
 *
 * This class is responsible for setting up the plugin constants and initializing the plugin.
 */
class Setup {
	/**
	 * Set the plugin constants.
	 *
	 * This method defines several constants used by the plugin, such as the plugin version, slug, path, and assets path and URL.
	 */
	private function set_constants() {
		define( 'OPD_VERSION', '0.1.0' );
		define( 'OPD_SLUG', 'opd-features' );
		define( 'OPD_PATH', plugin_dir_path( __DIR__ ) );
		define( 'OPD_ASSETS_PATH', OPD_PATH . 'build/' );
		define( 'OPD_ASSETS_URL', plugin_dir_url( __DIR__ ) . 'build/' );
	}

	/**
	 * Initialize the plugin.
	 *
	 * This method sets up the plugin by calling the set_constants() method and registering hooks for the taxonomies, meta, and assets.
	 */
	public function init() {
		$this->set_constants();

		( new Taxonomies\Location() )->register_hooks();
		( new Meta() )->register_hooks();
		( new Assets() )->register_hooks();
	}
}
