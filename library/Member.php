<?php

/**
 * Created by Code-Architect
 *
 * Class: Member Class
 */

class Member
{
    private $table;         // Database Table name table name

    public function __construct()
    {
        global $wpdb;
        $this->table = $wpdb->prefix."memberlist";
    }



    //list function

    // update function

    // delete function

    //insert function
}