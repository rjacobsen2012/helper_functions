<?php

/**
 * MiscTools
 *
 * @package
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com>
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class MiscTools
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

    /**
     * There are instances where we want to get table names and attributes directly
     * from the model name. Or load routes from controller class names. The namespace
     * gets in the way in these cases, so this helper just strips off the namespace.
     *
     * @static
     * @param Model $model The eloquent model is just passed by reference
     * @access public
     * @return string The class name with namespaces stripped off
     */
    public static function remove_namespace_from_class_name($model)
    {
        $model_name = explode("\\", $model);

        return end($model_name);
    }

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

    /**
     * This function takes a state name and returns the 2 letter postal
     * abbreviation. You can also pass in the postal code to return the
     * state name.
     *
     * @static
     * @access public
     * @param string $name State name or postal code
     * @param string $to   What to convert to, either abbreviation or full name
     *
     * @return string
     */
    public static function convert_state($name, $to='abbrev')
    {
        $states = array(
            array('name' =>'Alabama', 'abbrev'=>'AL'),
            array('name' =>'Alaska', 'abbrev'=>'AK'),
            array('name' =>'Arizona', 'abbrev'=>'AZ'),
            array('name' =>'Arkansas', 'abbrev'=>'AR'),
            array('name' =>'California', 'abbrev'=>'CA'),
            array('name' =>'Colorado', 'abbrev'=>'CO'),
            array('name' =>'Connecticut', 'abbrev'=>'CT'),
            array('name' =>'Delaware', 'abbrev'=>'DE'),
            array('name' =>'Florida', 'abbrev'=>'FL'),
            array('name' =>'Georgia', 'abbrev'=>'GA'),
            array('name' =>'Hawaii', 'abbrev'=>'HI'),
            array('name' =>'Idaho', 'abbrev'=>'ID'),
            array('name' =>'Illinois', 'abbrev'=>'IL'),
            array('name' =>'Indiana', 'abbrev'=>'IN'),
            array('name' =>'Iowa', 'abbrev'=>'IA'),
            array('name' =>'Kansas', 'abbrev'=>'KS'),
            array('name' =>'Kentucky', 'abbrev'=>'KY'),
            array('name' =>'Louisiana', 'abbrev'=>'LA'),
            array('name' =>'Maine', 'abbrev'=>'ME'),
            array('name' =>'Maryland', 'abbrev'=>'MD'),
            array('name' =>'Massachusetts', 'abbrev'=>'MA'),
            array('name' =>'Michigan', 'abbrev'=>'MI'),
            array('name' =>'Minnesota', 'abbrev'=>'MN'),
            array('name' =>'Mississippi', 'abbrev'=>'MS'),
            array('name' =>'Missouri', 'abbrev'=>'MO'),
            array('name' =>'Montana', 'abbrev'=>'MT'),
            array('name' =>'Nebraska', 'abbrev'=>'NE'),
            array('name' =>'Nevada', 'abbrev'=>'NV'),
            array('name' =>'New Hampshire', 'abbrev'=>'NH'),
            array('name' =>'New Jersey', 'abbrev'=>'NJ'),
            array('name' =>'New Mexico', 'abbrev'=>'NM'),
            array('name' =>'New York', 'abbrev'=>'NY'),
            array('name' =>'North Carolina', 'abbrev'=>'NC'),
            array('name' =>'North Dakota', 'abbrev'=>'ND'),
            array('name' =>'Ohio', 'abbrev'=>'OH'),
            array('name' =>'Oklahoma', 'abbrev'=>'OK'),
            array('name' =>'Oregon', 'abbrev'=>'OR'),
            array('name' =>'Pennsylvania', 'abbrev'=>'PA'),
            array('name' =>'Rhode Island', 'abbrev'=>'RI'),
            array('name' =>'South Carolina', 'abbrev'=>'SC'),
            array('name' =>'South Dakota', 'abbrev'=>'SD'),
            array('name' =>'Tennessee', 'abbrev'=>'TN'),
            array('name' =>'Texas', 'abbrev'=>'TX'),
            array('name' =>'Utah', 'abbrev'=>'UT'),
            array('name' =>'Vermont', 'abbrev'=>'VT'),
            array('name' =>'Virginia', 'abbrev'=>'VA'),
            array('name' =>'Washington', 'abbrev'=>'WA'),
            array('name' =>'West Virginia', 'abbrev'=>'WV'),
            array('name' =>'Wisconsin', 'abbrev'=>'WI'),
            array('name' =>'Wyoming', 'abbrev'=>'WY')
        );

        $return = false;
        foreach ($states as $state) {
            if ($to == 'name') {
                if (strtolower($state['abbrev']) == strtolower($name)) {
                    $return = $state['name'];
                    break;
                }
            } elseif ($to == 'abbrev') {
                if (strtolower($state['name']) == strtolower($name)) {
                    $return = strtoupper($state['abbrev']);
                    break;
                }
            }
        }
        return $return;
    }

    /**
     * Strips everything except for digits in the phone number
     *
     * @static
     * @access public
     * @param string $phone_number The pre-formatted phone number
     *
     * @return string The phone number stripped of everything except for digits
     */
    public static function convertPhoneNumber($phone_number)
    {
        //anything that's not 0-9 get replaced with an empty string
        $phone_number = \preg_replace('/[^x0-9]/', '', $phone_number);

        if (strlen($phone_number) == 11) {
            $phone_number = substr($phone_number, 1);
        }

        return $phone_number;
    }
}