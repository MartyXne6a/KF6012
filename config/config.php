<?php

define('BASEPATH', '/kf6012/coursework/part1');
define('DIS_DATABASE', 'db/dis.sqlite');
define('USER_DATABASE', 'db/user.sqlite');
define('DEVELOPMENT_MODE',true);

// Secret key used for generating the token
define('SECRET_KEY', 'xyz1234');

ini_set('display_errors', DEVELOPMENT_MODE);
ini_set('display_startup_errors', DEVELOPMENT_MODE);

include 'config/autoloader.php';
spl_autoload_register("autoloader");

include 'exceptionhandler.php';
//set jsonExceptionHandler as default handler to be triggered when any exception occurs
set_exception_handler('jsonExceptionHandler');

include 'errorHandler.php';
set_error_handler('errorHandler');

