<?php
/**
 * A Controller class for HTML homepage
 *
 * @author MARTINA PANI w19020174
 */

class HomeController extends Controller {

    protected function processRequest() {
        $page = new HomePage("Coursework - DIS Research Papers", ["home"=>"Home", "documentation"=>"Documentation"],"Designing Interactive Systems");
        $block = <<<EOT
<main id="mainGrid">
				<div class="imgBG">
				</div>
				<div class="index"> 
					<div id="mainContent">
EOT;
        $page->addBlock($block);
        $page->addHeading2("Homepage");
        $page->studentDetails("Martina Pani", "w19020174");
        $page->addParagraph("This work is a University Coursework that is not associated with or endorsed by
        the DIS conference.");
        $block = <<<EOT
</div>

</div>	
</main>
EOT;
        $page->addBlock($block);
        return $page->generateWebpage();
    }
}