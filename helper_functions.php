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
     * @access public
     * @return void
     */
    function pp($x, $die=true, $mail=null)
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
     * @access public
     * @return void
     */
    function email_exception($errors, $email, $extra = null)
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

if(!function_exists('objToArray')){
    /**
     * objToArray
     * 
     * This method with convert objects to arrays
     * 
     * @param object $object
     * @access public
     * @return void
     */
    function objToArray($obj, &$arr = array())
    {
        if(!is_object($obj) && !is_array($obj)){
            $arr = $obj;
            return $arr;
        }

        foreach ($obj as $key => $value) {
            if (!empty($value)) {
                $arr[$key] = array();
                objToArray($value, $arr[$key]);
            } else {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}

if(!function_exists('create_zip')){
    /**
     * Thanks to http://davidwalsh.name/create-zip-php
     */
    /* creates a compressed zip file */
    function create_zip($files = array(), $destination = '', $overwrite = false)
    {
        //if the zip file already exists and overwrite is false, return false
        if(file_exists($destination) && !$overwrite) { return false; }
        //vars
        $valid_files = array();
        //if files were passed in...
        if(is_array($files)) {
            //cycle through each file
            foreach($files as $file) {
                //make sure the file exists
                if(file_exists($file)) {
                    $valid_files[] = $file;
                }
            }
        }
        //if we have good files...
        if(count($valid_files)) {
            //create the archive
            $zip = new ZipArchive();
            if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }
            //add the files
            foreach($valid_files as $file) {
                $zip->addFile($file,basename($file));
            }
            //debug
            //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

            //close the zip -- done!
            $zip->close();

            //check to make sure the file exists
            return $destination;
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('create_temp_csv')){
    /**
     * create_temp_csv 
     * 
     * This method creates a temporary csv for email
     * 
     * @param mixed $csvdata
     * @access public
     * @return void
     */
    function create_temp_csv($csvdata){
        if(!$fp = fopen('php://temp', 'w+')) return false;
        foreach($csvdata as $line) fputcsv($fp, $line);
        rewind($fp);
        return stream_get_contents($fp);
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
     * @access public
     * @return void
     */
    function createmsg($logger, $msg, $log=true, $datestamp=true, $newline=true)
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
        //anything that's not 0-9 get replaced with an empty string
        $phone_number = \preg_replace('/[^x0-9]/', '', $phone_number);

        if (strlen($phone_number) == 11) {
            $phone_number = substr($phone_number, 1);
        }

        return $phone_number;
    }
}

if ( ! function_exists('remove_namespace_from_class_name')) {
    /**
     * There are instances where we want to get table names and attributes directly
     * from the model name. Or load routes from controller class names. The namespace
     * gets in the way in these cases, so this helper just strips off the namespace.
     *
     * @param Model $model The eloquent model is just passed by reference
     *
     * @return string The class name with namespaces stripped off
     */
    function remove_namespace_from_class_name($model)
    {
        $model_name = explode("\\", $model);

        return end($model_name);
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
        $result = array();
        foreach ($array as $value) {
            $result[$value] = $value;
        }

        return $result;
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
}

if (!function_exists('timestamp')) {
    /**
     * Nicely formatted date/time as string
     * @return string date/time
     */
    function timestamp()
    {
        return date("Y-m-d H:i:s");
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
     */
    function null_or_empty($value) {

        if(! empty($value) && ! is_null($value)) {
            return false;
        }

        return true;
    }
}

/**
 *  return_key_value_if_exists - checks if the array key exists, if it does return 
 *  the value otherwise return null;
 * 
 */
if(! function_exists('return_keys_value_if_exists'))
{
    function return_keys_value_if_exists($key, array $array_to_search)
    {
        if( array_key_exists($key, $array_to_search) ) {

            return $array_to_search[$key];

        } 

        return null;
       
    }
}

/**
 * Based on https://youtube.googleapis.com/v/zBaHBmZLDxY
 * 
 */
if(! function_exists('sort_multi_array_by_key'))
{
    function sort_multi_array_by_key(array $array, $key, $order = SORT_ASC)
    {   
        //Loop through and get the values of our specified key
        foreach($array as $v) {

            $values_of_the_key[] = strtolower($v[$key]);
        }

        switch ($order) {
            case SORT_ASC:
                asort($values_of_the_key);
                break;
            case SORT_DESC:
                arsort($values_of_the_key);
                break;
        }

        //now that we have the values sorted properly, we
        //have to put the sorted information on a new
        //array
        foreach($values_of_the_key as $k => $v) {

            $sorted_array[] = $array[$k];
        }
        
        return $sorted_array;
    }
}
