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
			'wh-win-wheel',
			array($this, 'admin_page_display'),
			'dashicons-images-alt',
			50
		);
	}

	public function admin_page_display()
	{
		include 'partials/wh-win-wheel-admin-display.php';
	}

}
