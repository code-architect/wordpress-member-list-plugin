<?php
/**********************************************************************************
 * Name:    ca-memberlist-shortcode.php
 *
 * Usage:   WP editor can add the short-code to list all members
 **********************************************************************************/

add_shortcode('ca_memberlist', 'ca_memberlist_user_form');


function ca_memberlist_user_form($atts)
{
    include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist-shortcode-form.php';
}
?>