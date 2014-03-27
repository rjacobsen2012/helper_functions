<?php

/**
 * HelperInterface
 *
 * @package
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com>
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
interface HelperInterface
{
    /**
     * Function to take an array and return an associative array where the
     * keys == values
     *
     * @static
     * @access public
     * @param array $array
     *
     * @return array Multidimensional array with keys == values
     */
    public static function array_values_to_keys($array);

    /**
     * Function to compare 2 arrays to see if they match
     * keys == values
     *
     * @static
     * @access public
     * @param array $array1
     * @param array $array2
     */
    public static function array_compare($array1, $array2);

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
    public static function return_keys_value_if_exists($key, array $array_to_search);

    /**
     * @static
     * @access public
     * @param array $array
     * @param type $key
     * @param type $order
     * @return array
     */
    public static function sort_multi_array_by_key(array $array, $key, $order = SORT_ASC);

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
    public static function create_temp_csv($csvdata);

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
    public static function email_exception($errors, $email, $extra = null);

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
    public static function pp($x, $die=true, $mail=null);

    /**
     * Nicely formatted date/time as string
     *
     * @static
     * @access public
     * @return string date/time
     */
    public static function timestamp();

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
    public static function remove_namespace_from_class_name($model);

    /**
     * Checks if the value is null or empty.  If it meets that criteria then return true.
     * Otherwise return false.
     *
     * @static
     * @param mixed $value
     * @access public
     * @return boolean
     */
    public static function null_or_empty($value);

    /**
     * Function to return a list of DB operators for searching
     *
     * @static
     * @access public
     * @return array Array of DB operators
     */
    public static function search_operators();

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
    public static function createmsg($logger, $msg, $log=true, $datestamp=true, $newline=true);

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
    public static function convert_state($name, $to='abbrev');

    /**
     * Strips everything except for digits in the phone number
     *
     * @static
     * @access public
     * @param string $phone_number The pre-formatted phone number
     *
     * @return string The phone number stripped of everything except for digits
     */
    public static function convertPhoneNumber($phone_number);

    /**
     * objToArray
     *
     * This method with convert objects to arrays
     *
     * @static
     * @param object $obj
     * @param array $arr
     * @access public
     * @return array
     */
    public static function objToArray($obj, &$arr = array());

    /**
     * Thanks to http://davidwalsh.name/create-zip-php
     *
     * creates a compressed zip file
     *
     * @static
     * @access public
     * @param array $files
     * @param string $destination
     * @param boolean $overwrite
     * @return mixed
     */
    public static function create_zip($files = array(), $destination = '', $overwrite = false);
}