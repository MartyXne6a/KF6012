<?php
/**
 * Custom function to handle errors
 *
 * @param $errno int          gives the type of error
 * @param $errstr string      gives the error message
 * @param $errfile string     gives the file where the error occurs
 * @param $errline int        gives the line in the file
 *
 * The parameters above are automatically generated by PHP and passed to the function.
 */
function errorHandler($errno, $errstr, $errfile, $errline) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // throw an exception if error is not a warning or notice
    // otherwise do nothing and carry on executing program
    if ($errno != 2 && $errno != 8) {
        throw new Exception("Error Detected: [$errno] $errstr file: $errfile line: $errline", 1);
    }
    // when DEVELOPMENT_MODE is true the system throws exception for both fatal errors and non-fatal errors
    if(DEVELOPMENT_MODE == true) {
        throw new Exception("Error Detected: [$errno] $errstr file: $errfile line: $errline", 1);
    }
}