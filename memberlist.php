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



// The short code
require_once('include/ca-memberlist-shortcode.php');

// The admin side plugin
require_once('include/ca-memberlist-admin.php');

/**********************************************************
 * CSS                                                    *
 *********************************************************/
// Register style sheet.
wp_enqueue_style( 'ca_plugin', "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");

?>
