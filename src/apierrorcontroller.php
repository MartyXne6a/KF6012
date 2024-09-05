<?php
/**
 * A Controller class for generating an error message encoded in JSON
 * in the event of a request to an API endpoint does not exist
 *
 * @author MARTINA PANI w19020174
 */

class ApiErrorController extends Controller {

    protected function processRequest()
    {
        $this->getResponse()->setMessage("not found");
        $this->getResponse()->setStatusCode(404);
        $data['documentation'] = 'http://unn-w19020174.newnumyspace.co.uk/kf6012/coursework/part1/documentation';

        return $data;
    }
}