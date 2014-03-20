<?php

/**
 * CreateMsg
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class CreateMsg
{
    /**
     * createmsg 
     * 
     * This method can be called from anywhere in your code to log a string
     * to a specific log file. It can alternatively be used as a way to
     * show status of methods by passing different parameters.
     * 
     * @static
     * @param mixed $logger 
     * @param mixed $msg 
     * @param mixed $log 
     * @param mixed $datestamp 
     * @param mixed $newline 
     * @access public
     * @return void
     */
    public static function createmsg($logger, $msg, $log=true, $datestamp=true, $newline=true)
    {
        if($log){
            if($logger){
                $logger->addInfo($msg);
            }
        }
        if($logger && (!isset($logger->show_echos) || (isset($logger->show_echos) && $logger->show_echos))){
            if($newline && $datestamp){
                echo date('m/d/Y h:i:s A').' '.$msg."\n";
            } elseif($newline) {
                echo $msg."\n";
            } else {
                echo $msg;
            }
        }
    }
}
