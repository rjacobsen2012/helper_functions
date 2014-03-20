<?php

/**
 * EmailTools
 *
 * @package
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com>
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class EmailTools
{
    /**
     * email_exception
     *
     * This method emails the exception
     *
     * @static
     * @param resource $e
     * @param string $email
     * @param mixed $extra
     * @access public
     * @return void
     */
    public static function email_exception($errors, $email, $extra = null)
    {
        if($extra){
            pp(array(
                $extra,
                $errors
            ), false, $email);
        } else {
            pp(array(
                $errors
            ), false, $email);
        }
    }
}