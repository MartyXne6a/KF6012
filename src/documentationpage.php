<?php
/**
 * A class to create human-readable HTML Documentation webpage
 *
 * @author MARTINA PANI w19020174
 */

class DocumentationPage extends Webpage
{

    public function studentDetails($name, $id)
    {
        $div = <<<EOT
<div class="right">
					<h3>Student Details</h3>
					<label>Full Name:</label><p>$name</p>
					<label>Student ID:</label><p>$id</p>
</div>
EOT;
        $this->setBody($div);
    }

    public function addApiNav($endpoints)
    {
        $apinav = <<<EOT
<div class="left">
<h3>Endpoints List</h3>
<nav>
<ul>
EOT;
        foreach($endpoints['name'] as $a)
        {
                $apinav .= "<li><a href = '#" . $a . "' >" . $a . "</a></li>";
        }
        $apinav .= "</ul></nav></div>";
        $this->setBody($apinav);
    }

    public function apiInfo($endpoints)
    {
        $endpointinfo = "<h3>API Information</h3>";
        $count = sizeof($endpoints['name']);
        for($i = 0; $i < $count ; $i++) {
            $url = "http://unn-w19020174.newnumyspace/".BASEPATH."/".$endpoints['name'][$i];
            $endpointinfo .= <<<EOT
					<section id="{$endpoints['name'][$i]}">
					    <label>Endpoint Name:</label><p>{$endpoints['name'][$i]}</p>
					    <label>Full URL:</label> <p><a href="$url">$url</a></p>
					    <label>Description:</label><p>{$endpoints['desc'][$i]}</p>
					    <label>Methods Supported:</label><p>{$endpoints['method'][$i]}</p>
					    <label>Authentication required:</label><p>{$endpoints['authentication'][$i]}</p>
					    <label>Parameters:</label>{$endpoints['params'][$i]}
					    <label>Likely Response codes:</label>{$endpoints['codes'][$i]}
					    <label>Content:</label>{$endpoints['content'][$i]}
					    <label>Example Request:</label>{$endpoints['eg_requests'][$i]}
					    <label>Example Response:</label>{$endpoints['eg_responses'][$i]}
					</section>
EOT;
        }
    $this->setBody($endpointinfo);
}
}