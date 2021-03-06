<?php
/*
Plugin Name: Member List Plugins
Plugin URI:  http://codearchitect.in/
Description: A member-list plugin which shows all the member-list in the website. And also allow the admin to edit, delete and insert new members into the list.
Version:     1.0
Author:      Code-Architect
Author URI:  http://codearchitect.in/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/
// define root directory
define('CA_MEMBER_LIST_PLUGIN_DIR', plugin_dir_path(__FILE__));

// define classes directory
define('CA_LIBRARY', CA_MEMBER_LIST_PLUGIN_DIR.'/library');

// define page directory
define('CA_PAGE', CA_MEMBER_LIST_PLUGIN_DIR.'/pages');

//-------------------------------------------------------------------
include CA_LIBRARY.'/Helper.php';
include CA_LIBRARY.'/Member.php';





/*****************************************************************
 * Installing the table at the activation point of the plugin    *                                                *
 *****************************************************************/
//
function ca_memberlist_activation() {
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    global $wpdb;
    $db_table_name = $wpdb->prefix . 'memberlist';
    if( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name'" ) != $db_table_name ) {
        if ( ! empty( $wpdb->charset ) )
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if ( ! empty( $wpdb->collate ) )
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE " . $db_table_name . "
			(
			`ca_id` INT(11) NOT NULL AUTO_INCREMENT ,
			`ca_name` VARCHAR(100) NOT NULL ,
			`ca_phone` VARCHAR(20) NOT NULL ,
			`ca_email` VARCHAR(100) NOT NULL ,
			`ca_extra` VARCHAR(100) NOT NULL ,
			PRIMARY KEY (`ca_id`)
			)
		  $charset_collate;";
        dbDelta( $sql );
    }
}
register_activation_hook(__FILE__, 'ca_memberlist_activation');
//-------------------------------------------------------------------



// The short code
require_once('include/ca-memberlist-shortcode.php');

// The admin side plugin
require_once('include/ca-memberlist-admin.php');

/**********************************************************
 * CSS                                                    *
 *********************************************************/
// Register style sheet.
wp_enqueue_style( 'ca_plugin', "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");

wp_enqueue_script('ca_plugin', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");

?>
