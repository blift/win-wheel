<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://websitehill.com/about-us/
 * @since      1.0.0
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/admin
 * @author     Jacek Gajewski <jacek.gajewski@websitehill.com>
 */
class Wh_Win_Wheel_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wh_Win_Wheel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wh_Win_Wheel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wh-win-wheel-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wh_Win_Wheel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wh_Win_Wheel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wh-win-wheel-admin.js', array( 'jquery' ), $this->version, false );

	}

	/* Add admin menu  */
	public function add_admin_menu()
	{
		add_menu_page(
			'Win Wheel Settings', 
			'Win Wheel Plugin', 
			'manage_options', 
			'wh-win-wheel-page',
			array($this, 'admin_page_display'),
			'dashicons-images-alt',
			50
		);

		add_submenu_page(
			'wh-win-wheel-page', 
			'Add custom text', 
			'Add text to modal', 
			'manage_options', 
			'wh-win-wheel-page-text', 
			array($this, 'admin_page_text_disaply')
		);
	}

	// All the hooks for admin init
	public function admin_init()
	{
		// Add sections 

	}

    public function admin_page_display()
    {

		$repeatable_fields = get_option( 'wh_win_repeatable_fields', true );

		if( isset( $_POST ) && ! empty ( $_POST ) ) {

			$old = get_option( 'wh_win_repeatable_fields', true );
			$new = array();
			
			$names = $_POST['text'];
			$urls = $_POST['image'];
			
			$count = count( $names );
			
			for ( $i = 0; $i < $count; $i++ ) {
				if ( $names[$i] != '' ) :
					$new[$i]['text'] = stripslashes( strip_tags( $names[$i] ) );
					
					if ( $urls[$i] == 'https://' )
						$new[$i]['image'] = '';
					else
						$new[$i]['image'] = stripslashes( $urls[$i] ); // and however you want to sanitize
				endif;

			}
			

			if ( !empty( $new ) && $new != $old ) {
		
				if ( 
					! isset( $_POST['wh_win_wheel_option_nonce'] ) 
					|| ! wp_verify_nonce( $_POST['wh_win_wheel_option_nonce'], 'wh_win_wheel_option_nonce' ) 
				) {
				 
				   print 'Sorry, your nonce did not verify.';
				   exit;
				 
				} else {
				 
					update_option( 'wh_win_repeatable_fields', $new );
				}
				
			}
		
		}

		include 'partials/wh-win-wheel-admin-display.php';

	}
	
	// Register route for JSON
	public function rest_api_init()
	{
		register_rest_route( 'whwinwhell/v1', '/whell/', array(
			'methods' => 'GET',
			'callback' => [$this, 'wh_win_whell_json_cb']
		) );
	}

	// Return array as json
	public function wh_win_whell_json_cb()
	{
		$options = get_option('wh_win_repeatable_fields');
		
		return $options;
	}

	// Add field with text
	public function admin_page_text_disaply()
	{
		include 'partials/wh-win-wheel-admin-text-display.php';
	}

}
