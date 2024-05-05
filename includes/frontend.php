<?php

/**
 * Outputs the accent color CSS for the current post or page.
 *
 * This function checks if the current page is a single post, home page, or archive page.
 * If it is a single post, it retrieves the post ID. If it is a home page or archive page,
 * it retrieves the ID of the first post in the query.
 *
 * It then retrieves the accent color meta value for the post ID, and if it exists,
 * it adds a custom CSS rule to the 'wp-block-library' stylesheet, setting the
 * '--opd-accent-color' variable to the accent color value.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'opd_output_accent_color' ) ) {
	function opd_output_accent_color() {
		global $wp_query;

		if ( is_single() ) {
			$post_id = get_the_ID();
		} elseif ( is_home() || is_archive() ) {
			$posts = $wp_query->get_posts();

			if ( count( $posts ) > 0 ) {
				$post_id = $posts[0]->ID;
			}
		}

		if ( isset( $post_id ) ) {
			$accent_color = get_post_meta( $post_id, 'opd_accent_color', true );

			if ( $accent_color ) {
				$custom_css = 'body { --opd-accent-color: ' . esc_html( $accent_color ) . '; }';
				wp_add_inline_style( 'wp-block-library', $custom_css );
			}
		}
	}
	add_action( 'enqueue_block_assets', 'opd_output_accent_color' );
}
