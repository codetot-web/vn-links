<?php
/**
 * Register post types
 *
 * @package vn_links_widget
 * @author codetot
 * @since 0.0.1
 */

class Vn_Links_Widget_Post_Types {
	/**
	 * Singleton instance
	 *
	 * @var Vn_Links_Widget_Post_Types
	 */
	private static $instance;

	/**
	 * Get singleton instance.
	 *
	 * @return Vn_Links_Widget_Post_Types
	 */
	public final static function instance()
	{
		if (is_null(self::$instance)) {
		self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		$this->metabox_url_id = 'links_url';

		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'add_meta_boxes', array( $this, 'links_metabox') );
		add_action( 'save_post', array( $this, 'save_metabox' ), 10, 2 );
	}

	public function register_post_type() {
		$labels = [
			"name" => __( "Links", "vn-links-widget" ),
			"singular_name" => __( "Link", "vn-links-widget" ),
			"menu_name" => __( "Links", "vn-links-widget" ),
			"all_items" => __( "All Links", "vn-links-widget" ),
			"add_new" => __( "Add new", "vn-links-widget" ),
			"add_new_item" => __( "Add new Link", "vn-links-widget" ),
			"edit_item" => __( "Edit Link", "vn-links-widget" ),
			"new_item" => __( "New Link", "vn-links-widget" ),
			"view_item" => __( "View Link", "vn-links-widget" ),
			"view_items" => __( "View Links", "vn-links-widget" ),
			"search_items" => __( "Search Links", "vn-links-widget" ),
			"not_found" => __( "No Links found", "vn-links-widget" ),
			"not_found_in_trash" => __( "No Links found in trash", "vn-links-widget" ),
			"parent" => __( "Parent Link:", "vn-links-widget" ),
			"featured_image" => __( "Featured image for this Link", "vn-links-widget" ),
			"set_featured_image" => __( "Set featured image for this Link", "vn-links-widget" ),
			"remove_featured_image" => __( "Remove featured image for this Link", "vn-links-widget" ),
			"use_featured_image" => __( "Use as featured image for this Link", "vn-links-widget" ),
			"archives" => __( "Link archives", "vn-links-widget" ),
			"insert_into_item" => __( "Insert into Link", "vn-links-widget" ),
			"uploaded_to_this_item" => __( "Upload to this Link", "vn-links-widget" ),
			"filter_items_list" => __( "Filter Links list", "vn-links-widget" ),
			"items_list_navigation" => __( "Links list navigation", "vn-links-widget" ),
			"items_list" => __( "Links list", "vn-links-widget" ),
			"attributes" => __( "Links attributes", "vn-links-widget" ),
			"name_admin_bar" => __( "Link", "vn-links-widget" ),
			"item_published" => __( "Link published", "vn-links-widget" ),
			"item_published_privately" => __( "Link published privately.", "vn-links-widget" ),
			"item_reverted_to_draft" => __( "Link reverted to draft.", "vn-links-widget" ),
			"item_scheduled" => __( "Link scheduled", "vn-links-widget" ),
			"item_updated" => __( "Link updated.", "vn-links-widget" ),
			"parent_item_colon" => __( "Parent Link:", "vn-links-widget" ),
		];

		$args = [
			"label" => __( "Links", "vn-links-widget" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => false,
			"query_var" => false,
			"menu_icon" => "dashicons-admin-links",
			"supports" => [ "title" ],
			"show_in_graphql" => false,
		];

		register_post_type( "vn-links", $args );
	}

	public function links_metabox() {
		add_meta_box(
			'vn-links-url',
			esc_html__( 'URL', 'vn-links-widget' ),
			array( $this, 'render_metabox' ),
			array( 'vn-links' )
		);
	}

	public function render_metabox( $post ) {
		$existing_url = get_post_meta( $post->ID, '_' . $this->metabox_url_id, true );
		?>
		<p class="vn-links-widget__row">
			<label for="<?php echo esc_attr( $this->metabox_url_id ); ?>" class="screen-reader-text"><?php esc_html_e( 'URL', 'vn-links-widget' ); ?></label>
			<input
				type="url"
				class="vn-links-widget__input"
				value="<?php echo esc_attr( $existing_url ); ?>"
				placeholder="<?php echo esc_html( 'https://' ); ?>"
				name="<?php echo esc_attr( $this->metabox_url_id ); ?>"
				id="<?php echo esc_attr( $this->metabox_url_id ); ?>"
			>
		</p>
		<?php
	}

	public function save_metabox( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( isset( $_POST[$this->metabox_url_id] ) ) {
			update_post_meta( $post_id, '_' . $this->metabox_url_id, sanitize_text_field( $_POST[$this->metabox_url_id] ) );
		}
	}
}
