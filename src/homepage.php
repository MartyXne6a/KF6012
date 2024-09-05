<?php
/**
 * A class to create human-readable HTML Homepage
 *
 * @author MARTINA PANI w19020174
 */

class HomePage extends WebPage
{
    public function addHeading2($header)
    {
        $this->setBody("<h2>".$header."</h2>");
    }

    public function studentDetails($name, $id)
    {
        $div = <<<EOT
<div class="studentDetails">
					<h3>Student Details</h3>
					<label>Full Name:</label><p>$name</p>
					<label>Student ID Number:</label><p>$id</p>
				</div>
EOT;
        $this->setBody($div);
    }
}