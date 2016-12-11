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


    /**
     * Update Member Data
     */
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


    /**
     * Delete Member data by id
     * @param $id
     */
    public function delete_member($id)
    {
        global $wpdb;
        $wpdb->delete(
            $this->table,
            ['ca_id' => $id],
            ['%d']
        );
    }


//==============================================================================================


    /**
     * Insert data into the database
     * @return int
     */
    public function insert_member()
    {
        global $wpdb;

        // remove unwanted data and sanitize data
        $data = Helper::excluding_fields($_POST,'ca_', ['ca_id', 'listaction']);
        $data = Helper::sanitize_array($data);

        if($this->check_email_exists($data['ca_email']))
        {
           return 1;
        }else
        {
            // check if the insert operation is a success
            if($wpdb->insert($this->table,$data) === false )
            {
                return 2;
            } else{
                return 3;
            }
        }
    }


//==============================================================================================


    private function check_email_exists($email)
    {
        global $wpdb;
        $sql = "SELECT ca_id FROM ".$this->table." WHERE ca_email = '{$email}'";
        $result = $wpdb->get_row($sql);

        return $result;

        if($result){
            return true;
        }else{
            return false;
        }
    }


//==============================================================================================
}