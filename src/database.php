<?php
/**
 * Connect to an SQLite database
 *
 * @author MARTINA PANI w19020174
 */

class Database
{
    /**
     * @var PDO $dbConnection
     */
    private $dbConnection;

    /**
    * constructor that set a sqlite database connection or throw an exception
     *
     * @param $dbname string      database name
     * @return void
     *
     */

    public function __construct($dbName)
    {
        $this->setDbConnection($dbName);
    }

    /**
     * Make a connection to a sqlite database or throw an exception
     *
     * @return void
     */
    private function setDbConnection($dbName)
    {
           if($this->dbConnection = new PDO('sqlite:'.$dbName)) {
               $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } else {
               throw new exception("Database Connection Fault");
           }
    }
    /**
     * @return PDO
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }
    /**
     * Execute an SQL prepared statement
     *
     * This function executes the query and uses the PDO 'fetchAll' method with the
     * 'FETCH_ASSOC' flag set so that an associative array of results is returned.
     *
     * @param string $sql       An SQL statement
     * @param array $params     An associative array of parameters (default empty array)
     * @return array            An associative array of the query results
     *
     */
    public function executeSQL( $sql, $params = [])
    {
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}