<?php

/**
 * NullOrEmpty
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class NullOrEmpty
{
    /**
     * Checks if the value is null or empty.  If it meets that criteria then return true.
     * Otherwise return false.
     * 
     * @static
     * @param mixed $value
     * @access public
     * @return boolean
     */
    public static function null_or_empty($value) {

        if(!empty($value) && ! is_null($value)) {
            return false;
        }

        return true;
    }
}
