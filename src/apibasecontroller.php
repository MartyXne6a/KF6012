<?php
/**
 * A controller class for  /api endpoint
 *
 * @author MARTINA PANI w19020174
 *
 */

class ApiBaseController extends Controller
{
    protected function processRequest()
    {
        $response['name'] = 'Martina Pani';
        $response['ìd'] = 'w19020174';
        $response['explanation'] = 'This is a Web API that allows to access specific features and data of a web application
        that presents information about academic papers of the topic Designing Interacting System (DIS). 
        The following URL can be used to access the API Documentation';
        $response['documentation'] = 'http://unn-w19020174.newnumyspace.co.uk/kf6012/coursework/part1/documentation';

        return $response;
    }
}