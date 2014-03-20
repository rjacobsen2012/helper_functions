<?php

/**
 * ArrayValuesToKeys 
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class ArrayValuesToKeys
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
}
