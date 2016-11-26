<?php
/**********************************************************************************
 * Name:    ca-memberlist-admin.php
 *
 **********************************************************************************/

add_action('admin_menu', 'ca_memberlist_admin_menu');

function ca_memberlist_admin_menu()
{
    add_menu_page('Member-List', 'CA Member-List', 'manage_options', 'memberlist_list', 'memberlist_list', 'dashicons-groups');

    add_submenu_page( 'memberlist_list', 'Add New Member', 'Add New', 'manage_options', 'memberlist_insert' , 'memberlist_insert');
}