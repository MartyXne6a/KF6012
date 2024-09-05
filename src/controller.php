<?php

/**
 * An abstract class that can be inherited by specific controller class for each API endpoint
 *
 * @author MARTINA PANI w19020174
 *
 */

abstract class Controller
{
    /**
     * @var $request Request - to store the 'request' object passed from index.php
     * @var $response Response - to store the 'response' object passed from index.php
     * @var $gateway Gateway - to store a 'gateway' object used to interact with the database
     */

    private $request;
    private $response;
    protected $gateway;

    public function __construct($request, $response)
    {
        $this->setGateway();
        $this->setRequest($request);
        $this->setResponse($response);

        $data = $this->processRequest();
        $this->getResponse()->setData($data);
    }

    private function setRequest($request)
    {
        $this->request = $request;
    }

    protected function getRequest()
    {
        return $this->request;
    }

    private function setResponse($response)
    {
        $this->response = $response;
    }

    protected function getResponse()
    {
        return $this->response;
    }

    protected function setGateway()
    {

    }

    protected function getGateway()
    {
        return $this->gateway;
    }

    protected function processRequest()
    {

    }

}