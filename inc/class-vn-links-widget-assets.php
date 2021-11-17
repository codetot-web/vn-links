<?php
/**
 * Register assets
 *
 * @package vn_links_widget
 * @author codetot
 * @since 0.0.1
 */

class Vn_Links_Widget_Assets {
	/**
	 * Singleton instance
	 *
	 * @var Vn_Links_Widget_Assets
	 */
	private static $instance;

	/**
	 * Get singleton instance.
	 *
	 * @return Vn_Links_Widget_Assets
	 */
	public final static function instance()
	{
		if (is_null(self::$instance)) {
		self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );
	}

	/**
	 * Enqueue frontend assets
	 *
	 * @return void
	 */
	public function frontend_assets() {
		wp_enqueue_script('vn-links-widget', VN_LINKS_WIDGET_URI . '/assets/frontend.js', array(), VN_LINKS_WIDGET_VERSION, true);
	}
}
