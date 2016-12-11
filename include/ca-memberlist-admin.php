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
        'Add New Member',       // menu title
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
    // check if current user have the permission
    if(!current_user_can('manage_options'))
    {
        wp_die('You do not have sufficient permission');
    }

    Helper::member_post_action();
}

/**********************************************************
 * Insert New data into memberlist table                  *
 *********************************************************/
function memberlist_insert()
{
    // check if current user have the permission
    if(!current_user_can('manage_options'))
    {
        wp_die('You do not have sufficient permission');
    }

    if(!empty($_POST))
    {
        Helper::member_post_action();
    }else{
        include CA_PAGE.'/ca-memberlist-insert.php';
    }

}
