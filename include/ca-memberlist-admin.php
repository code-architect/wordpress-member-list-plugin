<?php
/**********************************************************************************
 * Name:    ca-memberlist-admin.php
 *
 **********************************************************************************/

add_action('admin_menu', 'ca_memberlist_admin_menu');

function ca_memberlist_admin_menu()
{
    add_menu_page(
        'Member-List',      // page title
        'CA Member-List',   // menu title
        'manage_options',   // capabilities
        'memberlist_list',  // menu slug
        'memberlist_list',  // function
        'dashicons-groups'  // icon
    );

    add_submenu_page(
        'memberlist_list',      // parent slug
        'Add New Member',       // page title
        'Add New',              // menu title
        'manage_options',       //capabilities
        'memberlist_insert' ,   // menu slug
        'memberlist_insert'     // function
    );
}

/**********************************************************
 * Display Member list action page                        *
 *********************************************************/
function memberlist_list()
{
    global $wpdb;

    if(!current_user_can('manage_options'))
    {
        wp_die('You do not have sufficient permission');
    }

    include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist.php';
}