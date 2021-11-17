<?php
/**
 * @link              https://codetot.com
 * @since             0.0.1
 * @package           Vn_Links_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Vietnam Links Widget
 * Plugin URI:        https://codetot.com
 * Description:       Manage external links and display links as dropdown in a single widget. One of most feature for government sites in Vietnam.
 * Version:           0.0.1
 * Author:            CODE TOT JSC
 * Author URI:        https://codetot.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vn-links-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'VN_LINKS_WIDGET_VERSION', '0.0.1' );
define( 'VN_LINKS_WIDGET_DIR', plugin_dir_path(__FILE__));
define( 'VN_LINKS_WIDGET_URI', plugins_url('vn-links-widget'));
