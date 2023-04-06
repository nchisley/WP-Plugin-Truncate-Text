<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://natechisley.com/webpro
 * @since      1.0.0
 *
 * @package    Truncate_Text
 * @subpackage Truncate_Text/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Truncate_Text
 * @subpackage Truncate_Text/includes
 * @author     Nate Chisley <natechisley@gmail.com>
 */
class Truncate_Text_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'truncate-text',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
