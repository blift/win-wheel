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

	// All the hooks for admin init
	public function admin_init()
	{
		// Add sections 
		$this->add_settings_sections();

		// Add fields
		$this->add_settings_fields();

		// Save setting
		$this->save_fields();

	}

	// Callback for sections from admin init
	public function add_settings_sections()
	{
		// Add text to display
		add_settings_section(
			'wh-win-wheel-general-section', 
			'Add general text', 
			function(){ echo 'There will be general settings'; }, 
			'wh-win-wheel-settings'
		);

		// Add form with dynamic fields
		add_settings_section(
			'wh-win-wheel-form-section', 
			'Add images with text', 
			function(){ echo 'There will be form settings'; }, 
			'wh-win-wheel-settings'
		);
	}

	// Callback for fields from admin init
	public function add_settings_fields()
	{
		// For text
		add_settings_field(
			'win_wheel_text_field', 
			'Test field', 
			[$this, 'general_text_field_cb'],  
			'wh-win-wheel-settings', 
			'wh-win-wheel-general-section',
			[
				'name' => 'win_wheel_text_field',
				'value' => get_option('win_wheel_text_field')
			]
		);

		// For form img
		// add_settings_field(
		// 	'win_wheel_form_img_field', 
		// 	'Test field img', 
		// 	[$this, 'form_img_field_cb'], 
		// 	'wh-win-wheel-settings', 
		// 	'wh-win-wheel-form-section',
		// 	[
		// 		'name' => 'win_wheel_form_img_field',
		// 		'value' => get_option('win_wheel_form_img_field')
		// 	]
		// );

		// For form text
		add_settings_field(
			'win_wheel_form_txt_field', 
			'Test field text', 
			[$this, 'form_img_field_cb'],
			'wh-win-wheel-settings', 
			'wh-win-wheel-form-section',
			[
				'name' => 'win_wheel_form_txt_field',
				'value' => get_option('win_wheel_form_txt_field'),
				'name2' => 'win_wheel_form_img_field',
				'value2' => get_option('win_wheel_form_img_field')
			]
		);

	}

	// Callback for save fields from init
	public function save_fields()
	{
		// For text
		register_setting(
			'wh-win-wheel-settings-group', 
			'win_wheel_text_field',
			array(
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		//  For form img
		register_setting(
			'wh-win-wheel-settings-group', 
			'win_wheel_form_img_field'
		);

		//  For form txt
		register_setting(
			'wh-win-wheel-settings-group', 
			'win_wheel_form_txt_field',
			array(
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
	}


	// function for general text
	public function general_text_field_cb($args)
	{

		$name = ( isset($args['name']) ? esc_html($args['name']) : '' );
		$value = ( isset($args['value']) ? esc_html($args['value']) : '' );

		?>
			<input 
				type="text"
				name="<?php echo $name ?>"
				value="<?php echo $value ?>"
				class="field-<?php echo $name ?>"
			/>
		<?php
	}

	// function for img
	public function form_img_field_cb($args)
	{
		$test1[] = get_option('win_wheel_form_txt_field');
		$test2[] = get_option('win_wheel_form_img_field');

		$tests[] = array_merge($test1, $test2);

		foreach($tests as $test ) {
			echo '<pre>';
			var_dump($test);
			echo '</pre>';
		}


		$name = ( isset($args['name']) ? esc_html($args['name']) : '' );
		$value = ( isset($args['value']) ? esc_html($args['value']) : '' );

		$name2 = ( isset($args['name2']) ? esc_html($args['name2']) : '' );
		$value2 = ( isset($args['value2']) ? esc_html($args['value2']) : '' );

		?>
			<input 
				type="text"
				name="<?php echo $name ?>"
				value="<?php echo $value ?>"
				class="field-<?php echo $name ?>"
			/>
			
			<input 
				type="text"
				name="<?php echo $name2 ?>"
				value="<?php echo $value2 ?>"
				class="field-<?php echo $name2 ?>"
			/>
		<?php
	}

}
