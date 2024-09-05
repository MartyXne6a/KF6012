<?php
/**
 * Create an HTML response with appropriate headers
 *
 * @author MARTINA PANI w19020174
 */

class HTMLResponse extends Response
{
    protected function headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=UTF-8");
    }
}