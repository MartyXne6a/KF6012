<?php
/**
 * A controller class for /api/authors endpoint
 *
 * @author MARTINA PANI w19020174
 *
 */

class ApiAuthorsController extends Controller
{
    /**
     * set the gateway to interact with author table
     */
    protected function setGateway()
    {
        $this->gateway = new AuthorsGateway();
    }

    protected function processRequest()
    {
        $id = $this->getRequest()->getParameter('id');

        // Restrict to support only GET requests
       if ($this->getRequest()->getRequestMethod() === 'GET') {
            if (!is_null($id)) {
                $this->getGateway()->findOne($id);
            } else {
                $this->getGateway()->findAll();
            }
       } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }

        return $this->getGateway()->getResult();
    }
}