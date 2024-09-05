<?php

/**
 * A gateway to interact between the authors controller and the author table
 *
 * @author MARTINA PANI w19020174
 *
 */

class AuthorsGateway extends Gateway
{
    public function __construct()
    {
        $this->setDatabase(DIS_DATABASE);
    }
    public function findAll()
    {
        $sql = "SELECT * FROM author";
        $result = $this->getDatabase()->executeSQL($sql);

        $this->setResult($result);
    }
    public function findOne($id)
    {
        $sql = "SELECT * FROM author WHERE author_id = :id";
        $result = $this->getDatabase()->executeSQL($sql, ['id'=>$id]);

        $this->setResult($result);
    }
}