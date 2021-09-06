<?php
namespace PasbanCore\Service;

/**
 * The Pasban service that handle scan functions.
 *
 * @link       https://github.com/abdoljabbar
 * @since      1.0.0
 *
 *
 * @package    Pasban_Security_Scanner
 * @subpackage Pasban_Security_Scanner/admin
 * @author     Abdoljabbar Bakhsahnde <jabbkh@gmail.com>
 */

class PasbanService {

	private $response_array = array(
		'title'=> 'title',
		'status'=> false,
		'message' => 'message',
	);


	public function __construct()
	{
	}

	public function start()	 {
		// todo add cron
		$this->wp_version_check();
		$this->wp_theme_version_check();
		$this->wp_plugin_version_check();
		$this->wp_scan_check();
		$this->wp_shodan_check();
		$this->wp_login_check();
		$this->wp_login_pass_check();
		$this->wp_waf_check();
		$this->wp_https_check();
		$this->wp_user_admin_check();
		$this->wp_content_access_check();
		$this->wp_readme_access_check();
		$this->wp_xmlrpc_access_check();
		$this->wp_db_prefix_check();
		$this->wp_db_prepare_check();
		$this->wp_eval_check();
		$this->wp_create_function_check();
		$this->wp_xss_check();
		$this->wp_nonce_check();
		$this->wp_file_permission_check();
		$this->wp_plugin_static_check();
	}

	public function wp_version_check() {
		// todo add transient ***
		// todo transfer strings to another file **
		$this->response_array['title'] =  'wordpress version check';
		$curren_version = get_bloginfo( 'version' );
		$url = 'https://api.wordpress.org/core/version-check/1.7/';
		$response = wp_remote_get($url);

		$json = $response['body'];
		$obj = json_decode($json);
		$upgrade = $obj->offers[0];

		$last_version = $upgrade->version;

		if ( $curren_version >=  $last_version ) {
			// change status to true
			$this->response_array['status'] = true;
			wp_send_json_success( $this->response_array, 200 );
		}
	}

	public function wp_theme_version_check() {
		$this->response_array['title'] =  'active theme version check';
		$theme = wp_get_theme();
		var_dump($theme);

	}

	public function wp_plugin_version_check() {

	}

	public function wp_scan_check() {

	}

	public function wp_shodan_check() {

	}

	public function wp_login_check() {

	}

	public function wp_login_pass_check() {

	}

	public function wp_waf_check() {

	}

	public function wp_user_admin_check() {

	}

	public function wp_content_access_check() {

	}

	public function wp_readme_access_check() {

	}

	public function wp_xmlrpc_access_check() {

	}

	public function wp_db_prefix_check() {

	}

	public function wp_db_prepare_check() {

	}

	public function wp_eval_check() {

	}

	public function wp_create_function_check() {

	}

	public function wp_xss_check() {

	}

	public function wp_nonce_check() {

	}

	public function wp_file_permission_check() {

	}

	public function wp_https_check() {

	}

	public function wp_plugin_static_check() {

	}




}