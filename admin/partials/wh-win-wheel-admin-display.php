<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://websitehill.com/about-us/
 * @since      1.0.0
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/admin/partials
 */

if( ! defined( 'ABSPATH' ) ) {
    die();
};


?>

	<!-- This file should primarily consist of HTML with a little bit of PHP. -->

	<div class="wrap">

		<h1><?php echo get_admin_page_title(); ?></h1>

		<?php settings_errors(); ?>

		<form method="post" action="">
		
		<?php wp_nonce_field( 'wh_win_wheel_option_nonce', 'wh_win_wheel_option_nonce' ); ?>
			
		<table id="repeatable-fieldset-one" width="100%">
		<thead>
			<tr>
				<th width="40%">Name</th>
				<th width="40%">Image URL</th>
				<th width="8%"></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		if ( $repeatable_fields ) :
		
		foreach ( $repeatable_fields as $field ) {
		?>
		<tr>
			<td><input type="text" class="widefat" name="text[]" value="<?php if($field['text'] != '') echo esc_attr( $field['text'] ); ?>" /></td>
		
			<td><input type="text" class="widefat" name="image[]" value="<?php if ($field['image'] != '') echo esc_attr( $field['image'] ); else echo 'https://'; ?>" /></td>
		
			<td><a class="button remove-row" href="#">Remove</a></td>
		</tr>
		<?php
		}
		else :
		// show a blank one
		?>
		<tr>
			<td><input type="text" class="widefat" name="text[]" /></td>
		
			<td><input type="text" class="widefat" name="image[]" value="https://" /></td>
		
			<td><a class="button remove-row" href="#">Remove</a></td>
		</tr>
		<?php endif; ?>
		
		<!-- empty hidden one for jQuery -->
		<tr class="empty-row screen-reader-text">
			<td><input type="text" class="widefat" name="text[]" /></td>
		
			<td><input type="text" class="widefat" name="image[]" value="https://" /></td>
			
			<td><a class="button remove-row" href="#">Remove</a></td>
		</tr>
		</tbody>
		</table>
		
		<p><a id="add-row" class="button" href="#">Add another</a></p>

        <?php submit_button(); ?>
    </form>

</div>
