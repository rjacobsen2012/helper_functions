<?php

/**
 * PrePrintR 
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class PrePrintR
{
    /**
     * pp 
     * 
     * This method was added to display array and objects clearer
     * 
     * call this command anywhere in your code by pp($testdata) 
     * 
     * This command does the same thing as the php print_r method, but
     * with <pre></pre> tags around the result.
     * 
     * @static
     * @param mixed $x 
     * @param mixed $die 
     * @param mixed $mail 
     * @access public
     * @return void
     */
    public static function pp($x, $die=true, $mail=null)
    {
        if($mail){
            mail($mail, "importer debugging", "debug: ".print_r($x, true));
        } else {
            echo "<pre>".print_r($x, true)."</pre>";
            if($die){
                die;
            }
        }
    }
}
