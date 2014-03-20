<?php

/**
 * SearchOperators 
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class SearchOperators
{
    /**
     * Function to return a list of DB operators for searching
     *
     * @static
     * @access public
     * @return array Array of DB operators
     */
    public static function search_operators()
    {
        $opts = array();
        $opts['=']      = 'Equal';
        $opts['!=']     = 'Not equal';
        $opts['<']      = 'Less than';
        $opts['>']      = 'Greater than';
        $opts['<=']     = 'Less than or equal to';
        $opts['>=']     = 'Greater than or equal to';
        $opts['LIKE']   = 'LIKE';

        return $opts;
    }
}
