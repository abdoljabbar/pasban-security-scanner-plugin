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
		if (get_current_screen()->id !== 'toplevel_page_admin-pasban-security-scanner') {
			return;
		}

		wp_enqueue_style( 'bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/lib/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pasban-security-scanner-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// check if we are in pasban admin page then insert script
		if (get_current_screen()->id !== 'toplevel_page_admin-pasban-security-scanner') {
			return;
		}
		wp_enqueue_script( 'bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/lib/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'pasban-security-admin-js', plugin_dir_url( __FILE__ ) . 'js/pasban-security-scanner-admin.js', array( 'jquery' ), $this->version, false );

		// send data to js
		$variable_to_js = array(
			'nonce' => wp_create_nonce('start_scan_nonce') //for security
		);
		wp_localize_script('pasban-security-admin-js', 'scan_variable', $variable_to_js);

	}


	/**
	 * register pasban admin menu items
	 *
	 * @since    1.0.0
	 */

	 public function register_pasban_menu() {
		 add_menu_page(
			//  todo	add translation
			 __('Pasban Security Scanner', 'pasban-security-scanner'),
			 __('Pasban Scanner', 'pasban-security-scanner'),
			 'manage_options',
			 'admin-pasban-security-scanner',
			 array($this, 'pasban_setting_page'),
			 'dashicons-tagcloud',
			 6
		 );
	 }


	 /**
	 * Display the settings page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public static function pasban_setting_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/pasban-security-scanner-admin-display.php';

	}

	/**
	 * service add handle to start pasban scanner
	 *
	 * @since    1.0.0
	 */
	public static function pasban_start_scan_handler() {

		$nonce = $_POST['nonce'];
		// check nonce ===============================
		if ( !isset( $nonce ) || !wp_verify_nonce( $nonce, 'start_scan_nonce' ) ) {
			wp_die(-1);
		}
		$pasban_service = new \PasbanCore\Service\PasbanService;

		$pasban_service->start();

		wp_die();

	}

}