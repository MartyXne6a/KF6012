<?php
/**
* A gateway to interact between the authentication controller and the user table
*
* @author MARTINA PANI w19020174
*
*/

class UserGateway extends Gateway
{
    public function __construct()
    {
        $this->setDatabase(USER_DATABASE);
    }

    public function findPassword($email)
    {
        $sql = "SELECT id, password FROM user WHERE email = :email";
        $result = $this->getDatabase()->executeSQL($sql, [":email" => $email]);
        $this->setResult($result);
    }
}