<?php
/**
 * A controller class for /api/readinglist endpoint
 *
 * @author MARTINA PANI w19020174
 *
 */

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ApiReadingListController extends Controller
{
    /**
     * set the gateway to interact with list table
     */
    protected function setGateway()
    {
        $this->gateway = new ListGateway();
    }
    protected function processRequest() {
        if ($this->getRequest()->getRequestMethod() === "POST") {
            // get the token, add and remove parameters if supplied
            $token = $this->getRequest()->getParameter("token");
            $add = $this->getRequest()->getParameter("add");
            $remove = $this->getRequest()->getParameter("remove");


            // decode the token
            if (!is_null($token)) {
                $key = SECRET_KEY;
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $user_id = $decoded->user_id;

                //check if add or remove a paper from the list otherwise display the papers list
                //for the authenticated user
                if(!is_null($add)) {
                    $this->getGateway()->addPaper($user_id, $add);
                } elseif (!is_null($remove)) {
                    $this->getGateway()->removePaper($user_id, $remove);
                } else {
                    $this->getGateway()->findAll($user_id);
                }

            } else {
                $this->getResponse()->setMessage("Unauthorized");
                $this->getResponse()->setStatusCode(401);
            }

        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $this->getGateway()->getResult();
    }
}