<?php

/**
 * Provide a admin area view text for the plugin
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

if( isset( $_POST ) && ! empty( $_POST ) ) {
    
    update_option( 'wh_win_wheel_custom_text', sanitize_text_field($_POST['wh-win-wheel-custom-text']) );

}

?>

	<!-- This file should primarily consist of HTML with a little bit of PHP. -->

	<div class="wrap">

		<h1><?php echo get_admin_page_title(); ?></h1>

		<?php settings_errors(); ?>

		<form method="post" action="">
		
		<?php wp_nonce_field( 'wh_win_wheel_option_text_nonce', 'wh_win_wheel_option_text_nonce' ); ?>
		
        <table width="100%">
            <thead>
                <tr>
                    <th>Insert text for modal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="80%" >
                        <input
                            type="text"
                            name="wh-win-wheel-custom-text"
                            value="<?php echo get_option('wh_win_wheel_custom_text'); ?>"
                            class="large-text code"
                        />    
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>
    </form>

</div>
