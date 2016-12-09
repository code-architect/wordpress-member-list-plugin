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
}