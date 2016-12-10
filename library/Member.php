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


    /**
     * Fetch all the members from the database
     * @param string $id
     * @return array|bool|null|object
     */
    public function fetch_all_member()
    {
        global $wpdb;
        $sql = "SELECT * FROM " . $this->table;

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


//==============================================================================================


    public function get_specific_rows($id)
    {
        global $wpdb;
        $sql = "SELECT * FROM ".$this->table." WHERE ca_id = ".$id;

        $data = $wpdb->get_row($sql);

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


//==============================================================================================


    // update function
    public function update_member()
    {
        global $wpdb;
        $id = $_POST['ca_id'];

        $data = Helper::excluding_fields($_POST,'ca_', ['ca_id', 'listaction']);
        $data = Helper::sanitize_array($data);

        $wpdb->update(
            $this->table,
            $data,
            array( 'ca_id' => $id )
        );
    }


//==============================================================================================


    // Delete Member data
    public function delete_member($id)
    {
        print_r($id);
    }
    // delete function

    //insert function
}