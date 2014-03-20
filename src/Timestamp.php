<?php

/**
 * Timestamp
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class Timestamp
{
    /**
     * Nicely formatted date/time as string
     * 
     * @static
     * @access public
     * @return string date/time
     */
    public static function timestamp()
    {
        return date("Y-m-d H:i:s");
    }
}
