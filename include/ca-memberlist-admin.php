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
    // check if current user have the permission
    if(!current_user_can('manage_options'))
    {
        wp_die('You do not have sufficient permission');
    }

    Helper::member_post_action();
}


/**********************************************************
 * memberlist_post_action() - Handle Edit
 *********************************************************/

//function memberlist_post_action()
//{
//    global $id;
//    if(!empty($_POST))
//    {
//
//        $listaction = $_POST['listaction'];
//        if(isset($_POST['memberid']))
//        {
//            $id = $_POST['memberid'];
//        }
//        switch($listaction){
//            case 'insert':
//                include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist-insert.php';
//                break;
//            case 'edit':
//                include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist-edit.php';
//                break;
//            case 'list':
//                include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist.php';
//                break;
//            case 'handleupdate':
//                handle_memberlist_update();
//                include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist.php';
//                break;
//            case 'handledelete':
//                handle_memberlist_delete();
//                include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist.php';
//                break;
//            case 'handleinsert':
//            default:
//                echo "<h2>Nothing Found!</h2>";
//        }
//    }else{
//        include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist.php';
//    }
//}

/**********************************************************
 * Handle Delete requests
 *********************************************************/
function handle_memberlist_delete()
{
    global $wpdb;
    // check if the postr variable is set or not
    if(isset($_POST['memberid'])){
        $id = $_POST['memberid'];
        $sql = "DELETE FROM ".$wpdb->prefix."memberlist WHERE ca_id = ".$id;
        $wpdb->query($sql);
    }
}


/**********************************************************
 * Handle Delete requests
 *********************************************************/
function handle_memberlist_update()
{
    global $wpdb;

    $table = $wpdb->prefix.'memberlist';

    if(isset($_POST['memberid']))
    {
        $id = $_POST['memberid'];
    }

    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
    }

    if(isset($_POST['phone']))
    {
        $phone = $_POST['phone'];
    }

    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
    }

    if(isset($_POST['extra']))
    {
        $extra = $_POST['extra'];
    }

    $wpdb->update(
        $table,
        [
            'ca_name' => $name,
            'ca_phone' => $phone,
            'ca_email' => $email,
            'ca_extra' => $extra
        ],
        ['ca_id'=> $id],
        ['%s', '%s', '%s', '%s'],
        ['%s']
        );
}









