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
    public function fetch_all_member($id = '')
    {
        global $wpdb;
        $sql = "SELECT * FROM " . $this->table;

        //check if there is a condition or not
        if(!empty($id))
        {
            $sql = "SELECT * FROM " . $this->table." WHERE ca_id = ".$id;
        }
        $data = $wpdb->get_results($sql); // fetch data from database

        // check if there is data to show
        if(!$data)
        {
            return false;
        }
        else
        {
            return $data;
        }

    }

    // update function

    // delete function

    //insert function
}