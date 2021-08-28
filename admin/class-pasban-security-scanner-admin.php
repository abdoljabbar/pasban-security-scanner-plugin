<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/abdoljabbar
 * @since      1.0.0
 *
 * @package    Pasban_Security_Scanner
 * @subpackage Pasban_Security_Scanner/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pasban_Security_Scanner
 * @subpackage Pasban_Security_Scanner/admin
 * @author     Abdoljabbar Bakhsahnde <jabbkh@gmail.com>
 */
class Pasban_Security_Scanner_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// check if we are in pasban admin page then insert style
		if (get_current_screen()->id !== 'pasban-security-admin-page') {
			return;
		}

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pasban-security-scanner-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// check if we are in pasban admin page then insert script
		if (get_current_screen()->id !== 'pasban-security-admin-page') {
			return;
		}
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pasban-security-scanner-admin.js', array( 'jquery' ), $this->version, false );

	}

}