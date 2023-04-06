<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://natechisley.com/webpro
 * @since             1.0.0
 * @package           Truncate_Text
 *
 * @wordpress-plugin
 * Plugin Name:       Truncate Text
 * Plugin URI:        https://natechisley.com/wordpress-plugins/
 * Description:       Truncate Text is a simple WordPress plugin that allows you to truncate the text of your posts and pages. This plugin can be used to create short versions of content, like usernames, crypto wallet addresses, etc.
 * Version:           1.0.0
 * Author:            Nate Chisley
 * Author URI:        https://natechisley.com/webpro
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       truncate-text
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TRUNCATE_TEXT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-truncate-text-activator.php
 */
function activate_truncate_text() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-truncate-text-activator.php';
	Truncate_Text_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-truncate-text-deactivator.php
 */
function deactivate_truncate_text() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-truncate-text-deactivator.php';
	Truncate_Text_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_truncate_text' );
register_deactivation_hook( __FILE__, 'deactivate_truncate_text' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-truncate-text.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
/*
* DEFINE PLUGIN CONSTANTS
*/
define( 'MYPLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'MYPLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );

/*
* TRUNCATE TEXT
*/
function truncate_text( $atts, $content = null ) {
    // Extract shortcode attributes
    extract( shortcode_atts( array(
    'limit' => 6,
    'encoding' => 'UTF-8'
    ), $atts ) );

    // Truncate content
    $content_length = mb_strlen($content, $encoding);
    if($content_length > ($limit * 2 + 3)) {
    $content = mb_substr($content, 0, $limit, $encoding) . '...' . mb_substr($content, $content_length - $limit, $content_length, $encoding);
    }

    // Return truncated content
    return $content;
}
add_shortcode( 'truncate-text', 'truncate_text' );

/*
* TRUNCATE SHORTCODE
*/
function truncate_text_shortcode( $atts, $content = null ) {
    // Extract shortcode attributes
    extract( shortcode_atts( array(
        'limit' => 6,
        'encoding' => 'UTF-8'
    ), $atts ) );

    // Process other shortcodes in content
    $content = do_shortcode($content);

    // Truncate content
    $content_length = mb_strlen($content, $encoding);
    if($content_length > ($limit * 2 + 3)) {
    $content = mb_substr($content, 0, $limit, $encoding) . '...' . mb_substr($content, $content_length - $limit, $content_length, $encoding);
    }

    // Return truncated content
    return $content;
}
add_shortcode( 'truncate-shortcode', 'truncate_text_shortcode' );

/*
* INCLUDE SETTINGS PAGE
*/
require_once MYPLUGIN_PATH . '/settings.php';
