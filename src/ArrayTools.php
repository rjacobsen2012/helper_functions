<?php

/**
 * ArrayTools
 *
 * @package
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com>
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class ArrayTools
{
    /**
     * Function to take an array and return an associative array where the
     * keys == values
     *
     * @static
     * @access public
     * @param array $array
     *
     * @return array Multidimensional array with keys == values
     */
    public static function array_values_to_keys($array)
    {
        $result = array();
        foreach ($array as $value) {
            $result[$value] = $value;
        }

        return $result;
    }

    /**
     * Function to compare 2 arrays to see if they match
     * keys == values
     *
     * @static
     * @access public
     * @param array $array1
     * @param array $array2
     */
    public static function array_compare($array1, $array2)
    {
        if(array_diff($array1, $array2) || array_diff($array2, $array1)){
            return false;
        } else {
            return true;
        }
    }

    /**
     *  return_key_value_if_exists - checks if the array key exists, if it does return
     *  the value otherwise return null;
     *
     * @static
     * @param string $key
     * @param array $array_to_search
     * @access public
     * @return mixed
     */
    public static function return_keys_value_if_exists($key, array $array_to_search)
    {
        if( array_key_exists($key, $array_to_search) ) {

            return $array_to_search[$key];

        }

        return null;
    }

    /**
     * @static
     * @access public
     * @param array $array
     * @param type $key
     * @param type $order
     * @return array
     */
    public static function sort_multi_array_by_key(array $array, $key, $order = SORT_ASC)
    {
        //Loop through and get the values of our specified key
        foreach($array as $v) {

            $values_of_the_key[] = strtolower($v[$key]);
        }

        switch ($order) {
            case SORT_ASC:
                asort($values_of_the_key);
                break;
            case SORT_DESC:
                arsort($values_of_the_key);
                break;
        }

        //now that we have the values sorted properly, we
        //have to put the sorted information on a new
        //array
        foreach($values_of_the_key as $k => $v) {

            $sorted_array[] = $array[$k];
        }

        return $sorted_array;
    }
}