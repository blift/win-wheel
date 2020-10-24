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


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

    <h1><?php echo get_admin_page_title(); ?></h1>

    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        
        // Security fields
        settings_fields('wh-win-wheel-settings-group');

        // Text general
        do_settings_sections('wh-win-wheel-settings');

        // display section with dynamic fields
        ?>

        <?php
            do_settings_sections('wh-win-wheel-settings-form');
        ?>


        <?php submit_button(); ?>
    </form>

</div>
