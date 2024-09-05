<?php
/**
 * An abstract class that provides ways of interacting between
 * the Controller and the Database.
 *
 * @author MARTINA PANI w19020174
 */

abstract class Gateway
{
    /**
     * @var $database Database - holds the Database object
     * @var $result array - holds the result from executing query
     */
    private $database;
    private $result;

    protected function setDatabase($database)
    {
        $this->database = new Database($database);
    }

    protected function getDatabase()
    {
        return $this->database;
    }

    protected function setResult($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }
}
