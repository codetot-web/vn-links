<?php
/**
 * Main Class
 *
 * @package vn_links_widget
 * @author codetot
 * @since 0.0.1
 */

class Vn_Links_Widget_Init {
	public function __construct() {
		$this->load_classes();

		Vn_Links_Widget_Post_Types::instance();
		Vn_Links_Widget_Assets::instance();
	}

	/**
	 * Load all PHP classes
	 *
	 * @return void
	 */
	public function load_classes() {
		require_once VN_LINKS_WIDGET_DIR . 'inc/class-vn-links-widget-post-types.php';
		require_once VN_LINKS_WIDGET_DIR . 'inc/class-vn-links-widget-assets.php';
	}
}
