<?php

/**
 * ConvertPhoneNumber
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class ConvertPhoneNumber
{
    /**
     * Strips everything except for digits in the phone number
     *
     * @static
     * @access public
     * @param string $phone_number The pre-formatted phone number
     *
     * @return string The phone number stripped of everything except for digits
     */
    public static function convert($phone_number)
    {
        //anything that's not 0-9 get replaced with an empty string
        $phone_number = \preg_replace('/[^x0-9]/', '', $phone_number);

        if (strlen($phone_number) == 11) {
            $phone_number = substr($phone_number, 1);
        }

        return $phone_number;
    }
}
