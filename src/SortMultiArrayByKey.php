<?php

/**
 * SortMultiArrayByKey
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class SortMultiArrayByKey
{
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
