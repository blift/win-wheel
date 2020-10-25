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
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                        <div class="power_controls">
                            <br />
                            <br />
                            <table class="power" cellpadding="10" cellspacing="0">
                            </table>
                            <br />
                            <img id="spin_button" src="http://forplugins.local/wp-content/uploads/2020/07/pennant-1.jpg" alt="Spin" />
                            <br /><br />
                            <a class="button" href="#" id="spin_reset">Stop i reset</a><br /><p></p>
                        </div>
                    </td>
                    <td width="421" height="564" class="the_wheel" align="center" valign="center">
                        <canvas id="canvas" width="420" height="420">
                            <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                    </td>
                </tr>
            </table>
            <div class="wh-win-alert">
                <p>Tu bedzie teskt</p>
            </div>
        </div>
        <?
    }
}