<?php

namespace OPD;

class Blocks {
	public array $blocks = array( 'opd-location-meta' );

	public function register_hooks() {
		add_action( 'init', array( $this, 'register' ) );
	}

	public function register() {
		foreach ( $this->blocks as $block ) {
			register_block_type( OPD_BLOCKS_PATH . $block );
		}
	}
}
