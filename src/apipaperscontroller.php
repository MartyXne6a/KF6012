<?php

/**
 * A controller class for /api/papers endpoint
 *
 * @author MARTINA PANI w19020174
 *
 */

class ApiPapersController extends Controller
{
    protected function setGateway()
    {
        $this->gateway = new PapersGateway();
    }

    protected function processRequest()
    {
        $paperid = $this->getRequest()->getParameter("id");
        $authorid = $this->getRequest()->getParameter('authorid');
        $award = $this->getRequest()->getParameter('award');

        // Restrict to support only GET requests
        if ($this->getRequest()->getRequestMethod() === "GET") {

            if (!is_null($paperid)) {
                if($paperid === "random") {
                    $this->getGateway()->findRandom();
                } else {
                    $this->getGateway()->findOne($paperid);
                }
            } elseif (!is_null($authorid)) {
                $this->getGateway()->findByAuthor($authorid);
            } elseif (!is_null($award)) {
                $this->getGateway()->findAward($award);
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