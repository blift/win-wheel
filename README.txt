=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://websitehill.com/about-us/
Tags: comments, spam
Requires at least: 3.0.1
Tested up to: 5.5.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



== Description ==
This plugin allows to insert custom text and images and return as Win Wheel with modal alert.


== Installation ==


1. Download this repo as .zip
2. Upload `wh-win-wheel.zip` to the `/wp-content/plugins/` directory or via install plugin -> add new
3. Activate the plugin through the 'Plugins' menu in WordPress
4. IMPORTANT - first add some fields in "Win Wheel Plugin" page:
Text to text input, and url path to image URL input. Click save.
Plugin have to generate a json file to properly insert your fields in wheel

5. Place `[wh_win_wheel]` shortcode in your page
6. In settings "Add text modal" add your custom text to modal.



== Changelog ==

= 1.0 =
* Release 

== Third party library ==

http://wppb.io/ - wp plugin boilerplate
https://github.com/zarocknz/javascript-winwheel - win wheel
https://github.com/greensock/GSAP - gsap
https://github.com/mathusummut/confetti.js/ - confetti js

