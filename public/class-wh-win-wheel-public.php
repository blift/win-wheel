<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://websitehill.com/about-us/
 * @since      1.0.0
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/public
 * @author     Jacek Gajewski <jacek.gajewski@websitehill.com>
 */
class Wh_Win_Wheel_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wh-win-wheel-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( 'gsap', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'confetti', plugin_dir_url( __FILE__ ) . 'js/confetti.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'win-wheel', plugin_dir_url( __FILE__ ) . 'js/wh-win-wheel-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/Winwheel.js', array( 'jquery' ), $this->version, false );
	}


	// Register route for JSON
	public function register_rest_api()
	{
		register_rest_route( 'whwinwhell/v1', '/whell/', array(
			'methods' => 'GET',
			'callback' => [$this, 'wh_win_whell_json_cb'],
			'permission_callback' => '__return_true',
		) );

	}

	// Return array as json
	public function wh_win_whell_json_cb($args)
	{
		$args = get_option('wh_win_repeatable_fields');
		
		return $args;
	}
}
