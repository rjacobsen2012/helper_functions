<?php

/**
 * ReturnKeysValueIfExists
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class ReturnKeysValueIfExists
{
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
}
