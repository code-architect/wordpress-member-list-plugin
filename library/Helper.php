<?php

/**
 * Created by Code-Architect
 *
 * Class: Helper Class
 */

class Helper
{

    /**
     * @work Encode string
     * @param $string
     * @return string
     */
    public static function encode($string)
    {
        return $string = base64_encode($string);
    }

//================================================================


    /**
     * @work Decode encoded string
     * @param $string
     * @return string
     */
    public static function decode($string)
    {
        return $string = base64_decode($string);
    }


//================================================================


    /**
     * @work If there is not data in the data array return false
     * @param $array
     * @return string
     */
    public static function check_data_array($array)
    {
        if(empty($array)){
            return false;
        }else{
            return $array;
        }
    }


//================================================================

    public static function sanitize_array($array)
    {
        global $wpdb;
        $new_array = [];

        // escaping mysql_real_escape_string, special chars, and striping html tags
        foreach($array as $key => $value)
        {
            $new_array[$key] = htmlspecialchars(strip_tags($wpdb->_real_escape($value)));
        }
        return $new_array;
    }

//================================================================


    /**
     * @work Creating an associative array by adding fields and removing unwanted fields
     * @param array $rows   Given array
     * @param $rule         given rule. E.g: 'user_' or 'photo_' add every fields contains this prefix or suffix
     * @param array $fields given fields E.g: unset ['user_id', 'user_password'] etc.
     * @return array        return cleared array
     */
    public static function excluding_fields($rows = array(), $rule, $fields = array())
    {
        $val = [];

        foreach($rows as $key => $value){

            // checking the given rule, and putting values in the array
            if(strpos($key, $rule) !== false)
            {
                //un-setting by the given fields array
                foreach($fields as $field) {
                    unset($val[$field]);         // Removing this field
                    $val[$key] = $value;
                }
            }
        }
        // returning the array
        return $val;
    }


//================================================================


    public static function member_post_action()
    {
        // instantiate member class
        $member = new Member();

        global $id;
        if(!empty($_POST))
        {

            $listaction = $_POST['listaction'];
            if(isset($_POST['ca_id']))
            {
                $id = $_POST['ca_id'];
            }
            switch($listaction){
                case 'insert':
                    include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist-insert.php';
                    break;
                case 'edit':
                    include CA_PAGE.'/ca-memberlist-edit.php';
                    break;
                case 'list':
                    include CA_PAGE.'/ca-memberlist.php';
                    break;
                case 'handleupdate':
                    // Handle update
                    $member->update_member();
                    include CA_PAGE.'/ca-memberlist.php';
                    break;
                case 'handledelete':
                    $member->delete_member($id);
                    include CA_PAGE.'/ca-memberlist.php';
                    break;
                case 'handleinsert':
                default:
                    echo "<h2>Nothing Found!</h2>";
            }
        }else{
            include CA_MEMBER_LIST_PLUGIN_DIR.'/pages/ca-memberlist.php';
        }
    }
}