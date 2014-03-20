<?php

if ( ! function_exists('pp'))
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
     * @param mixed $x 
     * @param mixed $die 
     * @param mixed $mail 
     * @return void
     */
    function pp($x, $die=true, $mail=null)
    {
        return MiscTools::pp($x, $die, $mail);
    }
}

if ( ! function_exists('email_exception'))
{
    /**
     * email_exception 
     * 
     * This method emails the exception
     * 
     * @param resource $e
     * @param string $email
     * @param mixed $extra
     * @return void
     */
    function email_exception($errors, $email, $extra = null)
    {
        return EmailTools::email_exception($errors, $email, $extra);
    }
}

if(!function_exists('objToArray')){
    /**
     * objToArray
     * 
     * This method with convert objects to arrays
     * 
     * @param object $obj
     * @param array $arr
     * @return void
     */
    function objToArray($obj, &$arr = array())
    {
        return ObjectTools::objToArray($obj, $arr);
    }
}

if(!function_exists('create_zip')){
    /**
     * Thanks to http://davidwalsh.name/create-zip-php
     *
     * creates a compressed zip file
     * 
     * @param array $files
     * @param string $destination
     * @param boolean $overwrite
     * @return mixed
     */
    function create_zip($files = array(), $destination = '', $overwrite = false)
    {
        return ZipTools::create_zip($files, $destination, $overwrite);
    }
}

if(!function_exists('create_temp_csv')){
    /**
     * create_temp_csv 
     * 
     * This method creates a temporary csv for email
     * 
     * @param mixed $csvdata
     * @return void
     */
    function create_temp_csv($csvdata){
        return CsvTools::create_temp_csv($csvdata);
    }
}

if( ! function_exists('createmsg'))
{
    /**
     * createmsg 
     * 
     * This method can be called from anywhere in your code to log a string
     * to a specific log file. It can alternatively be used as a way to
     * show status of methods by passing different parameters.
     * 
     * @param mixed $logger 
     * @param mixed $msg 
     * @param mixed $log 
     * @param mixed $datestamp 
     * @param mixed $newline 
     * @return void
     */
    function createmsg($logger, $msg, $log=true, $datestamp=true, $newline=true)
    {
        return MiscTools::createmsg($logger, $msg, $log, $datestamp, $newline);
    }
}

if ( ! function_exists('convertPhoneNumber')) {
    /**
     * Strips everything except for digits in the phone number
     *
     * @param string $phone_number The pre-formatted phone number
     *
     * @return string The phone number stripped of everything except for digits
     */
    function convertPhoneNumber($phone_number)
    {
        return MiscTools::convert($phone_number);
    }
}

if ( ! function_exists('remove_namespace_from_class_name')) {
    /**
     * There are instances where we want to get table names and attributes directly
     * from the model name. Or load routes from controller class names. The namespace
     * gets in the way in these cases, so this helper just strips off the namespace.
     *
     * @param Model $model The eloquent model is just passed by reference
     * @return string The class name with namespaces stripped off
     */
    function remove_namespace_from_class_name($model)
    {
        return MiscTools::remove_namespace_from_class_name($model);
    }
}

if ( ! function_exists('search_operators')) {
    /**
     * Function to return a list of DB operators for searching
     *
     * @return array Array of DB operators
     */
    function search_operators()
    {
        return MiscTools::search_operators();
    }
}

if ( ! function_exists('array_values_to_keys')) {
    /**
     * Function to take an array and return an associative array where the
     * keys == values
     *
     * @param array $array
     *
     * @return array Multidimensional array with keys == values
     */
    function array_values_to_keys($array)
    {
        return ArrayTools::array_values_to_keys($array);
    }
}

if ( ! function_exists('convert_state')) {
    /**
     * This function takes a state name and returns the 2 letter postal
     * abbreviation. You can also pass in the postal code to return the
     * state name.
     *
     * @param string $name State name or postal code
     * @param string $to   What to convert to, either abbreviation or full name
     *
     * @return string
     */
    function convert_state($name, $to='abbrev')
    {
        return MiscTools::convert_state($name, $to);
    }
}

if (!function_exists('timestamp')) {
    /**
     * Nicely formatted date/time as string
     * 
     * @return string date/time
     */
    function timestamp()
    {
        return MiscTools::timestamp();
    }
}

/**
 * Returns false if the value is null or empty.
 * 
 */
if ( ! function_exists('null_or_empty')) {

    /**
     * Checks if the value is null or empty.  If it meets that criteria then return true.
     * Otherwise return false.
     * 
     * @param mixed $value
     * @return boolean
     */
    function null_or_empty($value) {
        return MiscTools::null_or_empty($value);
    }
}

if(! function_exists('return_keys_value_if_exists'))
{
    /**
    *  return_key_value_if_exists - checks if the array key exists, if it does return 
    *  the value otherwise return null;
    * 
     * @param string $key
     * @param array $array_to_search
     * @return mixed
    */
    function return_keys_value_if_exists($key, array $array_to_search)
    {
        return ArrayTools::return_keys_value_if_exists($key, $array_to_search);
    }
}

/**
 * Based on https://youtube.googleapis.com/v/zBaHBmZLDxY
 * 
 */
if(! function_exists('sort_multi_array_by_key'))
{
    /**
     * @param array $array
     * @param type $key
     * @param type $order
     * @return array
     */
    function sort_multi_array_by_key(array $array, $key, $order = SORT_ASC)
    {   
        return ArrayTools::sort_multi_array_by_key($array, $key, $order);
    }
}
