<?php
/*
Plugin Name: Member List Plugins
Plugin URI:  http://codearchitect.in/
Description: A member-list plugin which shows all the member-list in the website. And also allow the admin to edit, delete and insert new members into the list.
Version:     1.0
Author:      Indranil Samanta
Author URI:  http://codearchitect.in/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

define('CA_MEMBER_LIST_PLUGIN_DIR', plugin_dir_path(__FILE__));

// The short code
require_once('include/ca-memberlist-shortcode.php');

// The admin side plugin
require_once('include/ca-memberlist-admin.php');
?>
