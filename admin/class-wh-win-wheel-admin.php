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



	/**
	 * Repeatable Custom Fields in a Metabox
	 * Author: Helen Hou-Sandi
	 *
	 * From a bespoke system, so currently not modular - will fix soon
	 * Note that this particular metadata is saved as one multidimensional array (serialized)
	 */
	
	private function hhs_get_sample_options() {
		$options = array (
			'Option 1' => 'option1',
			'Option 2' => 'option2'
		);
		
		return $options;
	}

	public function hhs_add_meta_boxes() {
		add_meta_box( 
			'repeatable-fields', 
			'Repeatable Fields', 
			[$this, 'hhs_repeatable_meta_box_display'], 
			'post', 
			'normal', 
			'default'
		);
	}

	public function hhs_repeatable_meta_box_display() {
		global $post;

		$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
		$options = $this->hhs_get_sample_options();

		wp_nonce_field( 'hhs_repeatable_meta_box_nonce', 'hhs_repeatable_meta_box_nonce' );
		?>
	
		<table id="repeatable-fieldset-one" width="100%">
		<thead>
			<tr>
				<th width="40%">Name</th>
				<th width="12%">Select</th>
				<th width="40%">URL</th>
				<th width="8%"></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		if ( $repeatable_fields ) :
		
		foreach ( $repeatable_fields as $field ) {
		?>
		<tr>
			<td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>
		
			<td>
				<select name="select[]">
				<?php foreach ( $options as $label => $value ) : ?>
				<option value="<?php echo $value; ?>"<?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
		
			<td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'http://'; ?>" /></td>
		
			<td><a class="button remove-row" href="#">Remove</a></td>
		</tr>
		<?php
		}
		else :
		// show a blank one
		?>
		<tr>
			<td><input type="text" class="widefat" name="name[]" /></td>
		
			<td>
				<select name="select[]">
				<?php foreach ( $options as $label => $value ) : ?>
				<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
		
			<td><input type="text" class="widefat" name="url[]" value="http://" /></td>
		
			<td><a class="button remove-row" href="#">Remove</a></td>
		</tr>
		<?php endif; ?>
		
		<!-- empty hidden one for jQuery -->
		<tr class="empty-row screen-reader-text">
			<td><input type="text" class="widefat" name="name[]" /></td>
		
			<td>
				<select name="select[]">
				<?php foreach ( $options as $label => $value ) : ?>
				<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
			
			<td><input type="text" class="widefat" name="url[]" value="http://" /></td>
			
			<td><a class="button remove-row" href="#">Remove</a></td>
		</tr>
		</tbody>
		</table>
		
		<p><a id="add-row" class="button" href="#">Add another</a></p>
		<?php
	}


	public function hhs_repeatable_meta_box_save($post_id) {
		if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce'], 'hhs_repeatable_meta_box_nonce' ) )
			return;
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;
		
		if (!current_user_can('edit_post', $post_id))
			return;
		
		$old = get_post_meta($post_id, 'repeatable_fields', true);
		$new = array();
		$options = hhs_get_sample_options();
		
		$names = $_POST['name'];
		$selects = $_POST['select'];
		$urls = $_POST['url'];
		
		$count = count( $names );
		
		for ( $i = 0; $i < $count; $i++ ) {
			if ( $names[$i] != '' ) :
				$new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
				
				if ( in_array( $selects[$i], $options ) )
					$new[$i]['select'] = $selects[$i];
				else
					$new[$i]['select'] = '';
			
				if ( $urls[$i] == 'http://' )
					$new[$i]['url'] = '';
				else
					$new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
			endif;
		}

		if ( !empty( $new ) && $new != $old )
			update_post_meta( $post_id, 'repeatable_fields', $new );
		elseif ( empty($new) && $old )
			delete_post_meta( $post_id, 'repeatable_fields', $old );
	}
}
