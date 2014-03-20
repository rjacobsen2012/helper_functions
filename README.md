#helper_functions
---
[![Latest Stable Version](https://poser.pugx.org/helper-functions/helper_functions/v/stable.png)](https://packagist.org/packages/helper-functions/helper_functions) [![Total Downloads](https://poser.pugx.org/helper-functions/helper_functions/downloads.png)](https://packagist.org/packages/helper-functions/helper_functions) [![Build Status](https://travis-ci.org/rjacobsen2012/helper_functions.svg?branch=master)](https://travis-ci.org/rjacobsen2012/helper_functions) [![Coverage Status](https://coveralls.io/repos/rjacobsen2012/helper_functions/badge.png)](https://coveralls.io/r/rjacobsen2012/helper_functions)

Helper_functions is a PHP package with simple helper functions used in php to do a variety of things. The benefit is being able to transport these simple functions from one app to the next without having to recreate these functions to do everyday things we do in PHP.

##README Contects
---
* [Installation](#install)
	* [Requirements](#requirements)
	* [Install With Composer](#install-composer)

<a name="install"/>	
##Installation
---

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