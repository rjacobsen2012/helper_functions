#helper_functions

[![Latest Stable Version](https://poser.pugx.org/php/helper_functions/v/stable.png)](https://packagist.org/packages/php/helper_functions) [![Total Downloads](https://poser.pugx.org/php/helper_functions/downloads.png)](https://packagist.org/packages/php/helper_functions) [![Build Status](https://travis-ci.org/rjacobsen2012/helper_functions.svg?branch=master)](https://travis-ci.org/rjacobsen2012/helper_functions) [![Coverage Status](https://coveralls.io/repos/rjacobsen2012/helper_functions/badge.png)](https://coveralls.io/r/rjacobsen2012/helper_functions)

Helper_functions is a lightweight PHP package with simple helper functions used in php to do a variety of things. The benefit is being able to transport these simple functions from one app to the next without having to recreate these functions to do everyday things we do in PHP.

##README Contents

* [Installation](#install)
	* [Requirements](#requirements)
	* [Install With Composer](#install-composer)
* [Methods Included](#methods)

<a name="install"/>	
##Installation


<a name="requirements"/>
###Requirements

- Any version of PHP 5.4+

<a name="install-composer"/>
### Install With Composer

You can install the library via [Composer](http://getcomposer.org) by adding the following line to the **require** block of your *composer.json* file:

````
"helper-functions/helper_functions": "dev-master"
````

Next run `composer install`, or `composer update` if you already have composer installed.

Then run `composer dumpautoload` to load the classes.

<a name="methods">
##Methods Included

###array_values_to_keys($array)
````
This method takes an array, and returns an associative array where the keys are now what were the values.

returns an array
````

###array_compare($array1, $array2)
````
Function to compare 2 arrays to see if they match.

returns true if they match, false if they do not
````

###return_keys_value_if_exists($key, $array_to_search)
````
Checks if the array key exists.

returns the value if the key exists, or returns null
````

###sort_multi_array_by_key($array, $key, $order)
````
Sorts the Multidimensional array by the keys.

returns array
````

###create_temp_csv($csvdata)
````
This method creates a temporary csv for email.

returns the contents of the csv
````

###email_exception($errors, $email, $extra)
````
This method emails the exception that was thrown to the email provided, along
with whatever you put in the $extra value.

returns void
````

###pp($x, $die, $mail)
````
This method was added to display array and objects clearer. Call this command anywhere in your code by pp($testdata). This command does the same thing as the php print_r method, but with <pre></pre> tags around the result.

Setting the $die to true will kill the process when the method is called.

The $mail option, if filled with an email address, will send an email to the email with the result of the method. This is helpfull when trying to debug code you cannot display the output from.

returns void
````

###timestamp()
````
This simply returns the current timestamp formatted for a database.

returns string
````

###remove_namespace_from_class_name($model)
````
There are instances where we want to get table names and attributes directly from the model name, or load routes from controller class names. The namespace gets in the way in these cases, so this helper just strips off the namespace.

returns string
````

###null_or_empty($value)
````
Checks if the value is null or empty.

returns true if the $value is empty, false if the $value is not empty and not null.
````

###search_operators()
````
Function to return a list of DB operators for searching.

returns array
````

###createmsg($logger, $msg, $log, $datestamp, $newline)
````
This method can be called from anywhere in your code to log a string to a specific log file. It can alternatively be used as a way to show status of methods by passing different parameters.

If you want to log the message, simply set the $log to true. The $logger must be an instance of Logger, or null. If $logger is null, nothing will be logged.

If you fill the $datestamp, there will be a timestamp in front of your message.

If the $newline is set to true, it will add a line break at the end of the message.

returns void
````

###convert_state($name, $to)
````
This function takes a state name and returns the 2 letter postal abbreviation. You can also pass in the postal code to return the state name.

returns string
````

###convertPhoneNumber($phone_number)
````
Strips everything except for digits in the phone number.

returns string
````

###objToArray($obj, $arr)
````
This method will convert objects to arrays.

returns array
````

###create_zip($files, $destination, $overwrite)
````
Creates a compressed zip file from the files passed, and if the $destination is set, writes the files to the $destination. If the $overwrite value is true, this will overwrite the current file.

returns false - if no $files were passed, if the $destination does not exists, or if the $overwrite option is set to false and the file exists already - or returns string containing the file location
````