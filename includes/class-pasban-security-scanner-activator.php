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
class Pasban_Security_Scanner_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        global $wpdb;
        $current_version = PASBAN_SECURITY_SCANNER_VERSION;

        $installed_version = get_option("pasban_scanner_version");
		// check if we have installed version
        if (!$installed_version) {
            $table_name = $wpdb->prefix . 'pasban_scanner';

			// create pasban_scanner table
			// todo search about enum performance *
            $sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				name tinytext NOT NULL,
				title tinytext NOT NULL,
				status enum('done','inprogress','pending','failed') DEFAULT 'pending' NOT NULL,
				progress tinyint(4),
				result_status enum('passed','failed'),
				result_detail text,
				description text,
				last_date datetime,
				subscription enum('free','paid') DEFAULT 'free' NOT NULL,
				priority enum('critical','high','normal','low'),
				PRIMARY KEY  (id)
			);";


            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            $query_result = dbDelta($sql);

			// check if we don't have pasban_scanner_version option then create it otherwise update
            if ( !update_option( 'pasban_scanner_version', $current_version ) ) {
                add_option('pasban_scanner_version', $current_version);
            }
        }
    }
}