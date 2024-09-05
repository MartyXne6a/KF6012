<?php

/**
 * A gateway to interact between the papers controller and the paper and author tables
 *
 * @author MARTINA PANI w19020174
 *
 */

class PapersGateway extends Gateway
{
    public function __construct()
    {
        $this->setDatabase(DIS_DATABASE);
    }
    public function findAll()
    {
        $sql = "SELECT * FROM paper ORDER BY title ";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    //find paper with the given id
    public function findOne($paperid)
    {
        $sql = "SELECT * FROM paper 
    INNER JOIN paper_author on (paper_author.paper_id = paper.paper_id)
INNER JOIN author on (paper_author.author_id = author.author_id)
WHERE paper_author.paper_id = :id";
        $result = $this->getDatabase()->executeSQL($sql, ['id'=>$paperid]);

        //if no author was found set an appropriate message
        if(isset($result['author_id']))
        {
            $result['message'] = "There is no author for this paper.";
        }

        $this->setResult($result);
    }

    //find papers authored by the person with the given id
    public function findByAuthor($authorid)
    {
        $sql = "SELECT paper.paper_id, paper.title FROM paper 
    INNER JOIN paper_author on (paper_author.paper_id = paper.paper_id)
INNER JOIN author on (paper_author.author_id = author.author_id)
WHERE author.author_id = :id";
        $result = $this->getDatabase()->executeSQL($sql, ['id'=>$authorid]);

        //if no paper was found set an appropriate message
        if(isset($result['paper_id']))
        {
            $result['message'] = "There is no paper for this author.";
        }

        $this->setResult($result);
    }

    //find papers that have one an award
    public function findAward()
    {
        $sql = "SELECT paper.paper_id, paper.title, award_type.name FROM paper 
    INNER JOIN award on (award.paper_id = paper.paper_id)
INNER JOIN award_type on (award.award_type_id = award_type.award_type_id)";

        $result = $this->getDatabase()->executeSQL($sql);

        $this->setResult($result);
    }
    //find rando paper
    public function findRandom()
    {
        $sql = "SELECT * FROM paper 
    INNER JOIN paper_author on (paper_author.paper_id = paper.paper_id)
INNER JOIN author on (paper_author.author_id = author.author_id)
ORDER BY random() limit 1";

        $result = $this->getDatabase()->executeSQL($sql);

        $this->setResult($result);
    }

}