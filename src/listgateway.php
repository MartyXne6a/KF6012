<?php

/**
 * A gateway to interact between the reading list controller and the list table
 *
 * @author MARTINA PANI w19020174
 *
 */

class ListGateway extends Gateway
{
    public function __construct()
    {
        $this->setDatabase(USER_DATABASE);
    }

    // find all papers of the user's reading list
    public function findAll($user_id)
    {
        $sql = "SELECT DISTINCT paper_id from list WHERE user_id = :user";
        $result = $this->getDatabase()->executeSQL($sql, [":user" => $user_id]);
        $this->setResult($result);
    }
    // add a paper on the user's reading list
    public function addPaper($user_id, $paper_id)
    {
        $sql = "INSERT INTO list (user_id, paper_id) values (:user, :paper)";
        $result = $this->getDatabase()->executeSQL($sql, [":user" => $user_id, ":paper" => $paper_id]);
        $this->setResult($result);
    }
    // remove a paper on the user's reading list
    public function removePaper($user_id, $paper_id)
    {
        $sql = "DELETE FROM list WHERE (user_id = :user) AND (paper_id = :paper)";
        $result = $this->getDatabase()->executeSQL($sql, [":user" => $user_id, ":paper" => $paper_id]);
        $this->setResult($result);
    }
}