<?php

/**
 * CreateTempCsv
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class CreateTempCsv
{
    /**
     * create_temp_csv 
     * 
     * This method creates a temporary csv for email
     * 
     * @static
     * @param mixed $csvdata
     * @access public
     * @return void
     */
    public static function create_temp_csv($csvdata){
        if(!$fp = fopen('php://temp', 'w+')) return false;
        foreach($csvdata as $line) fputcsv($fp, $line);
        rewind($fp);
        return stream_get_contents($fp);
    }
}
