<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/abdoljabbar
 * @since      1.0.0
 *
 * @package    Pasban_Security_Scanner
 * @subpackage Pasban_Security_Scanner/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Pasban_Security_Scanner
 * @subpackage Pasban_Security_Scanner/includes
 * @author     Abdoljabbar Bakhsahnde <jabbkh@gmail.com>
 */
class Pasban_Security_Scanner_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;
		$installed_ver = get_option( "jal_db_version" );

		if ( $installed_ver != $jal_db_version ) {

			$table_name = $wpdb->prefix . 'liveshoutbox';

			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				name tinytext NOT NULL,
				text text NOT NULL,
				url varchar(100) DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			);";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );

			update_option( "jal_db_version", $jal_db_version );
	}

}