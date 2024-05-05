<?php
/**
 * Creates a class to handle registering taxonomies.
 */

namespace OPD\Taxonomies;

class Location {
	/**
	 * Register taxonomies.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Register the location taxonomy.
	 *
	 * @return void
	 */
	public function register() {

		$labels = array(
			'name'              => _x( 'Locations', 'taxonomy general name', 'opd' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name', 'opd' ),
			'search_items'      => __( 'Search Locations', 'opd' ),
			'all_items'         => __( 'All Locations', 'opd' ),
			'parent_item'       => __( 'Parent Location', 'opd' ),
			'parent_item_colon' => __( 'Parent Location:', 'opd' ),
			'edit_item'         => __( 'Edit Location', 'opd' ),
			'update_item'       => __( 'Update Location', 'opd' ),
			'add_new_item'      => __( 'Add New Location', 'opd' ),
			'new_item_name'     => __( 'New Location Name', 'opd' ),
			'menu_name'         => __( 'Location', 'opd' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'location' ),
		);

		/**
		 * Register the 'location' taxonomy.
		 *
		 * This function registers a hierarchical taxonomy called 'location' for the 'post' post type.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		register_taxonomy( 'location', array( 'post' ), $args );
	}
}
