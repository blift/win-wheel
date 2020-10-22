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



if( isset( $_POST ) && ! empty( $_POST ) ) {

    update_option( 'wh_win_whell_count', $_POST['wh-card-number'] );
    update_option( 'wh_win_whell_image', $_POST['wh-win-whell-image'] );
    update_option( 'wh_win_whell_description', $_POST['wh-win-whell-description'] );

}

$value_array[] = get_option('wh_win_whell_count');

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap wh-win-will-container">
    <h1>Win Wheel Plugin</h1>
    <p>To return cards as a shortcode copy and paste somewhere on this page <strong>[wh-win-wheel-sc]</strong></p>

    <div class="form-group add-field">
        <form method="post" action="" id="wh_add_field">
            <div class="wh-win-will-cards">  
                <div class="wh-win-will-card">
                    <table class="form-table">
                        <tr>
                            <td>
                                <div class="wh-card-number-count-wrapper">
                                    <p>    
                                        <span id="wh-card-number-count">1</span>
                                    </p>
                                </div>
                                <input 
                                    type="hidden"
                                    name="wh-card-number[]"
                                    class="form-control"
                                    id="wh-card-hidden-val"
                                    value="1"
                                    <? echo get_option('wh_win_whell_count'); ?>>
                            </td>
                            <td><input 
                                type="text" 
                                placeholder="Enter image" 
                                name="wh-win-whell-image[]" 
                                id="description" 
                                class="form-control" 
                                value=""
                                <? echo get_option('wh_win_whell_image'); ?>>
                            </td>

                            <td><input 
                                type="text" 
                                placeholder="Enter description" 
                                name="wh-win-whell-description[]" 
                                id="description" 
                                class="form-control" 
                                value=""
                                <? echo get_option('wh_win_whell_description'); ?>>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row-columns">
                <div class="column-6">
                    <?php submit_button(); ?>
                </div>
                <div class="column-6">
                    <div class="button-add-more">
                        <button class="btn btn-warning add-more"><span>+ Add More</span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<?php 
$value[] = get_option('wh_win_whell_count');

echo '<pre>';
var_dump($value);
echo '</pre>';
?>