<?php
/**
 * A Controller class to generate a HTML error page in the event
 * of a request to an URL that has correspondence with no webpage
 *
 * @author MARTINA PANI w19020174
 */

class ErrorController extends Controller
{
    protected function processRequest()
    {
        $page = new HomePage("Coursework - DIS Conference", ["home"=>"Home", "documentation"=>"Documentation"],"DIS Conference");

        $block = <<<EOT
<main id="mainGrid">
				<div class="imgBG">
				</div>
				<div class="index"> 
					<div id="mainContent" class = "error">
EOT;
        $page->addBlock($block);
        $page->addHeading2("Error Page");
        $page->addParagraph("404 Page not found");
        $block = <<<EOT
</div>

</div>	
</main>
EOT;
        $page->addBlock($block);
        return $page->generateWebpage();
    }
}
