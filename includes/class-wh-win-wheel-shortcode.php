<?php

/**
 * The file that defines the shortocde
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://websitehill.com/about-us/
 * @since      1.0.0
 *
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wh_Win_Wheel
 * @subpackage Wh_Win_Wheel/includes
 * @author     Jacek Gajewski <jacek.gajewski@websitehill.com>
 */
class Wh_Win_Wheel_Shortcode {
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
     * Adding shortcode [wh_win_wheel]
     */
    public function wh_win_wheel()
    {
        ?>
        <div class="wh-win-front-center">
        <canvas id="canvasConfetti"></canvas>
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
        <?
    }
}