<?php
/**
 * Plugin Name: WP Persistent Query Strings
 * Plugin URI: http://www.github.com/joeyscarim
 * Description: Barebones and easy-to-edit Wordpress plugin for setting a persistent query string that can be displayed and used in links via shortcode
 * Version: 1.0.2
 * Author: Joey Scarim
 * Author URI: http://www.joeyscarim.com
 */

define('WPPQS_VERSION', '1.0.2');
define('WPPQS_FILE', __FILE__);
define('WPPQS_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once WPPQS_PLUGIN_DIR . '/core/WPPersistentQueryStrings.php';
require_once WPPQS_PLUGIN_DIR . '/core/settings.php';

new WP_Persistent_Query_Strings();
