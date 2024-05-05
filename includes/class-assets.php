<?php
/**
 * Create an assets class to handle registering and enqueuing assets.
 */

namespace OPD;

class Assets {
	/**
	 * Register assets.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'register_block_editor_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
	}

	private function add_style( string $name, array $dependencies = array() ) {
		wp_enqueue_style(
			"opd-{$name}-style",
			OPD_ASSETS_URL . $name . '.css',
			$dependencies,
			OPD_VERSION
		);
	}

	private function add_script( string $name, array $params = array(), array $dependencies = array() ) {
		$asset_filepath = OPD_ASSETS_PATH . $name . '.asset.php';
		$asset_file     = file_exists( $asset_filepath ) ? include $asset_filepath : array(
			'dependencies' => array(),
			'version'      => OPD_VERSION,
		);

		wp_register_script(
			"opd-{$name}-plugin-script",
			OPD_ASSETS_URL . $name . '.js',
			array_merge( $asset_file['dependencies'], $dependencies ),
			$asset_file['version'],
			true
		);

		if ( ! empty( $params ) ) {
			wp_add_inline_script( "opd-{$name}-plugin-script", 'const opdParams = ' . wp_json_encode( $params ), 'before' );
		}

		wp_enqueue_script( "opd-{$name}-plugin-script" );
	}

	public function register_block_editor_assets() {
		$this->add_style( 'admin' );
		$this->add_script( 'admin' );
	}

	public function register_assets() {
		$this->add_style( 'app' );
		$this->add_script( 'app' );
	}
}
