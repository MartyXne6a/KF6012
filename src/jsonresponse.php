<?php

/**
 * Create a JSON response with appropriate headers and json encoded data
 *
 * @author MARTINA PANI w19020174
 */

class JSONResponse extends Response
{
    private $message;
    private $statusCode;

    // set headers for JSON responses
    protected function headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        header("Content-Type: application/json; charset=UTF-8");
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getData()
    {
        //check if the array is null
        if(is_null($this->data)) {
            $this->data = [];
        }

        //check if a message has been generated due method not allowed
        if (is_null($this->message)) {
            if (count($this->data) > 0) {
                $this->setMessage("ok");
            } else {
                $this->setMessage("no content");
            }
        }

        $response['message'] = $this->message;
        $response['count'] = count($this->data);
        $response['results'] = $this->data;

        return json_encode($response);
    }
}