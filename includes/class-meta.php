<?php
/**
 * Creates a meta class to handle registering meta fields.
 */

namespace OPD;

class Meta {
	/**
	 * Register meta fields.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'init', array( $this, 'register_accent_color_meta' ) );
	}

	/**
	 * Register the accent color meta field.
	 *
	 * @return void
	 */
	public function register_accent_color_meta() {
		$opd_accent_meta_schema = array(
			'single'        => true,
			'type'          => 'string',
			'auth_callback' => fn() => current_user_can( 'edit_posts' ),
			'show_in_rest'  => array(
				'name'   => 'opd_accent_color',
				'type'   => 'string',
				'schema' => array(
					'type'    => 'string',
					'format'  => 'hex-color',
					'context' => array( 'edit' ),
				),
			),
		);
		register_post_meta(
			'post',
			'opc_accent_color',
			$opd_accent_meta_schema
		);
		register_post_meta(
			'page',
			'opc_accent_color',
			$opd_accent_meta_schema
		);
	}
}
