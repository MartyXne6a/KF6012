<?php
/**
 * A controller class for /api/authenticate endpoint
 *
 * @author MARTINA PANI w19020174
 *
 */
use Firebase\JWT\JWT;

class ApiAuthenticationController extends Controller
{
    /**
     * set the gateway to interact with user table
     */
    protected function setGateway()
    {
        $this->gateway = new UserGateway();
    }

    protected function processRequest()
    {
        $data = [];
        $email = $this->getRequest()->getParameter('email');
        $password = $this->getRequest()->getParameter('password');

        // Restrict to support only POST requests
        if ($this->getRequest()->getRequestMethod() === 'POST') {

         //check if parameters have been inserted otherwise return 401 status code
            if (!is_null($email) && !is_null($password)) {
                $this->getGateway()->findPassword($email);
                 //check if the email matches a record
                  if (count($this->getGateway()->getResult()) == 1) {

                      $hashpassword = $this->getGateway()->getResult()[0]['password'];

                      // Verify if the password inserted matches with the retrieved hashpassword
                      if (password_verify($password, $hashpassword)) {
                          $key = SECRET_KEY;

                          // The token will contain two items of data, a user_id and an expiry time
                          $payload = array(
                              "user_id" => 1,
                              "exp" => time() + 7776000
                          );

                          // Use the JWT class to encode the token
                          $jwt = JWT::encode($payload, $key, 'HS256');

                          $data = ['token' => $jwt];
                      }
                  }
              }
                // if no token was decoded set status code 401
                if(!array_key_exists('token', $data)) {
                    $this->getResponse()->setMessage("Unauthorized");
                    $this->getResponse()->setStatusCode(401);
                }

        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $data;
    }
}