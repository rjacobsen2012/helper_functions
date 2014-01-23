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

        foreach ($obj as $key => $value)
        {
            if (!empty($value))
            {
                $arr[$key] = array();
                objToArray($value, $arr[$key]);
            }
            else
            {
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
                $logger->info($msg);
            }
        }
        if($logger && $logger->show_echos){
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
