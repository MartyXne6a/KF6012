<?php

/**
 * Parse the URL to work out the requested path
 *
 * @author MARTINA PANI w19020174
 */

class Request
{

    // BASEPATH defined in config.php
    private $basepath =  BASEPATH;
    private $path;
    private $requestmethod;

    public function __construct()
    {
        // parse_url PHP function returns an associative array containing the components of
        // the URL requested
        // $_SERVER["REQUEST_URI"] informs the actual URL requested by the user

        $this->path = parse_url($_SERVER["REQUEST_URI"])['path'];
        // Mistakenly use of uppercase is dealt converting the path to lowercase
        $this->path = strtolower(str_replace($this->basepath, "", $this->path));
        // Mistakenly use of slashes to the end of URL is dealt removing them from the path
        $this->path = trim($this->path,"/");

        // Get the request method used
        $this->requestmethod = $_SERVER['REQUEST_METHOD'];
    }

    public function getPath()
    {
        return $this->path;
    }
    /**
     * This method will get and sanitise the given parameter.
     * Return null if the parameter does not exist or false if the filter is triggered
     *
     */
    public function getParameter($param)
    {
        if ( $this->getRequestMethod() === 'GET') {
            $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ( $this->getRequestMethod() === 'POST'){
            $param = filter_input(INPUT_POST, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $param;
    }
    /**
     * This method will get the request method that has been used
     */
    public function getRequestMethod()
    {
        return $this->requestmethod;
    }
}
