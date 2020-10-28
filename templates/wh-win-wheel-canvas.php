<?php

/**
 * Tempalte output with canvas
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://websitehill.com/about-us/
 * @since      1.0.0
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/public/partials
 */
?>


<div class="wh-win-front-center">
    <div class="wh-win-wheel-grid">
        <div class="wh-win-wheel-col-1">
            <div class="wh-win-wheel-control-wrapper">
                <div class="power_controls">
                    <div class="button" id="spin_button">Start</div>
                    <a class="button" href="#" id="spin_reset">Stop i reset</a><br /><p></p>
                </div>
            </div>
        </div>
        <div class="wh-win-wheel-col-2">
            <div width="421" height="564" class="the_wheel" align="center" valign="center">
                <canvas id="canvas" width="420" height="420">
                    <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                </canvas>
            </div>
        </div>
    </div>
    <!-- MODAL WIN ALERT -->
    <div class="wh-win-alert">
        <div class="wh-win-alert-overlay">
            <div class="wh-win-wheel-wrapper">
                <div class="wh-win-wheel-inner">
                    <span class="wh-win-wheel-close">X</span>
                    <div class="wh-win-wheel-field-text">
                        <h2><?php echo get_option('wh_win_wheel_custom_text'); ?></h2>
                    </div>    
                    <div class="wh-win-wheel-text-container"></div>
                    <div class="wh-win-whell-image-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>