<?php
/**
 * A generic parent class to create human-readable HTML webpages
 *
 * @author MARTINA PANI w19020174
 */

class WebPage
{
    /**
     * @var $head string holds the <head> block
     * @var $body string holds the <body> block
     * @var $foot string holds <body> and <html> closing tags
     * @var $foot string holds the main nav bar
     * @var $style string holds stylesheet path
     *
     */
    private $head;
    private $body;
    private $foot;
    private $nav;
    private $style;

    /**
     * @param $title string should be inserted into the <title> block
     * @param $h1 string holds the heading 1 that should be inserted into the <h1> block
     */
    public function __construct($title, array $links, $h1)
    {
        $this->style = "./assets/style.css";
        $this->setNav($links);
        $this->setHead($title);
        $this->addNav();
        $this->addHeading1($h1);
        $this->setFoot();
    }

    protected function setHead($title)
    {
        $this->head = <<<EOT
<!DOCTYPE html>
<html lang="en-gb">
<head>
<meta charset="UTF-8">
		<!--tell mobile browsers to make the size of the layout viewport equal to the device width or the size of the screen-->
		<meta name="viewport" content="width=device-width">
		<!--to fix this modify the meta element that you just added so that it is as follows-->
    	<meta name="viewport" content="width=device-width,maximum-scale=1.0">
		<title>$title</title> 
		<link href='$this->style' rel="stylesheet" type="text/css">
</head>
<body>
<div id="gridContainer">
			<header>
				<div id="gridHeader">
EOT;
    }

    private function getHead()
    {
        return $this->head;
    }

    protected function setBody($text)
    {
        $this->body .= $text;
    }

    private function getBody()
    {
        return $this->body;
    }

    protected function setFoot()
    {
        $nav = $this->getNav();
        $this->foot = <<<EOT
<footer class="copyR">
				<p>DIS - Designing Interactive Systems &copy; 2022</p>
				$nav
			</footer>
		</div>
</body>
</html>
EOT;
    }

    private function getFoot()
    {
        return $this->foot;
    }

    /**
     * setter function to create a top navigation bar
     * @param $links arrays contains all
     */
    protected function setNav($links)
    {
        $this->nav = "<nav> <ul>";
        foreach ($links as $l => $a) {
            $this->nav .= "<li><a href = " . $a . " >" . $a . "</a></li>";
        }
        $this->nav .= "</ul></nav>";
    }
    protected function addNav()
    {
        $this->setBody($this->getNav());
    }
    private function getNav()
    {
        return $this->nav;
    }

        protected function addHeading1($header)
    {
        $this->setBody("<h1>" . $header . "</h1></div></header>");
    }

    public function addBlock($block)
    {
        $this->setBody( $block );
    }
    public function addParagraph($text)
    {
        $paragraph = <<<EOT
<p>$text</p>
EOT;
        $this->setBody( $paragraph );
    }

    public function addHeading2($header)
    {
        $this->setBody("<h2>".$header."</h2>");
    }

    public function generateWebPage()
    {
        return $this->getHead().$this->getBody().$this->getFoot();
    }

}
