<?php
/**
 * A Controller class for HTML API Documentation Page
 *
 * @author MARTINA PANI w19020174
 */

class DocumentationController extends Controller
{
    protected function processRequest()
    {
        $endpoints = array (
            "name" => array ("api/", "api/authors", "api/papers", "api/authenticate", "api/readinglist"),
            "desc" => array (
                "Returns an array with student information, a short explanation of what the API is, and information on how to access to the API Documentation.",
                "Returns an array of authors details.",
                "Returns an array of papers.",
                "Returns a jwt if username and password match.",
                "Returns an array of papers details in the reading list of the authenticated user, and allows to add and remove papers from them reading list."
            ),
            "method" => array ("GET","GET","GET","POST","POST"),
            "authentication" => array ("FALSE","FALSE","FALSE","TRUE","TRUE"),
            "params" => array (
                "<p>N/A</p>",

                "<p>id (int, optional) – returns the details for author with the corresponding id.</p>",

                "<p>id (int, optional) – returns the paper with the corresponding id or a message if there is no author for this paper.</p>
<p>authorid (int, optional) – returns all papers authored by the person identified by the given id, or a message if there is no paper for the author with the corresponding id.</p>
<p>award (award = all) – returns all papers that have won an award.</p>
<p>id = random – returns a paper with the corresponding random id.</p>",

                "<p>username – the user’s email.</p><p>password – the user’s password.</p>",

                "<p>token – authorises access to the reading list.</p><p>add – adds on the user’s reading list the corresponding paper of the id entered.</p>
<p>remove – from the user’s reading list removes the corresponding paper of the id entered.</p>"
            ),

            "codes" => array (
                "<p>200 ok returns the array.</p><p>404 not found – no endpoint found.</p>",
                "<p>200 ok - returns the array.</p><p>204 no content – no author found for the id inserted.</p>
<p>405 method not allowed – the request is not GET method.</p><p>404 not found – no endpoint found.</p>",

                "<p>200 ok - returns the array.</p><p>204 no content – no author found for the id inserted.</p>
<p>405 method not allowed – the request is not GET method.</p><p>404 not found – no endpoint found.</p>",

                "<p>200 ok - returns the array.</p><p>204 no content – no author found for the id inserted.</p>
<p>405 method not allowed – the request is not GET method.</p><p>404 not found – no endpoint found.</p>
<p>401 unauthorised – no token decoded.</p>",

                "<p>200 ok - returns the array.</p><p>204 no content – no author found for the id inserted.</p>
<p>405 method not allowed – the request is not GET method.</p><p>404 not found – no endpoint found.</p>
<p>401 unauthorised – no token decoded.</p>"
            ),
            "content" => array (
                "<p>name – Student full name.</p><p>id – Student ID number.</p><p>explanation – short explanation of what the API is</p>
<p>documentation – full URL to access to the API Documentation.</p>",

                "<p>author_id – author’s id (an integer of five digits starting from 59463).</p>
<p>first_name – author’s first name.</p><p>middle_name – author’s middle name.</p><p>last_name – aurhor’s last name.</p>",

                "<div><span>id</span><p>paper_id – paper’s id (an integer of five digits starting from 60071).</p>
<p>title – paper’s title.</p><p>abstract – paper’s abstract.</p><p>doi – paper’s digital object identifier.</p>
<p>video – a link to paper’s YouTube video.</p><p>preview – a link to the preview of the video.</p><p>author_id – the author’s id of the paper.</p>
<p>first_name – author’s first name.</p><p>middle_name – author’s middle name.</p><p>last_name – aurhor’s last name.</p>
<p>message – a message to inform that there is no author for the paper.</p></div>
<div><span>authorid</span><p>paper_id – paper’s id (an integer of five digits starting from 60071).</p>
<p>title – paper’s title</p><p>message – a message to inform that there is no paper for the specified author.</p></div>
<div><span>award</span><p>title – paper’s title.</p><p>name – the name of the type of award won.</p></div>",

                "<p>token - JSON Web Token (jwt) – holds appropriate data including expiry date.</p>",

                "<p>paper_id – paper’s id</p>"
            ),

            "eg_requests" => array (
                "",
                "<p>unn-w19020174.newnumyspace.co.uk/kf6012/coursework/part1/api/authors?id=59463</p>",

                "<p>unn-w19020174.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?id=60071</p>
<p>unn-w19020174.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?authorid=59463</p>
<p>unn-w19020174.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?award=all</p>",
                "",
                ""
            ),

            "eg_responses" => array (
                '<p>[{</p>
    <p>"name": "Firstname Surname ",</p>
    <p>"ìd": "w19090404",</p>
    <p>"explanation": "This is a basic Web API",</p>
    <p>"documentation": "www.newnumyspace.co.uk/kf6012/coursework/part1/documentation</p>
    <p>}]</p>',

                '<p>[{</p><p>"author_id":"59463",</p><p>"first_name":"Kerstin",</p><p>"middle_name":"",</p>
<p>"last_name":"Bongard-Blanchy"</p><p>}]</p>',

                '<div><span>id</span><p>[{"paper_id":"60073",</p>
<p>"title":"Exploring Personalized Vibrotactile and Thermal Patterns for Affect Regulation",</p>
<p>"abstract":"The growing HCI interest in wellbeing has led to the emerging area of haptics for affect regulation. In such technologies, distinct haptic patterns are usually designed by researchers; however.",</p>
<p>"doi":"https:\/\/dl.acm.org\/doi\/10.1145\/3461778.3462042",</p>
<p>"video":"https:\/\/www.youtube.com\/watch?v=E_ju4BnIq3E",</p>
<p>"preview":"https:\/\/www.youtube.com\/watch?v=f1IRMolrbf4",</p>
<p>"author_id":"59877",</p>
<p>"first_name":"Muhammad",</p>
<p>"middle_name":"",</p>
<p>"last_name":"Umair</p><p>}]</p></div>
<div><span>authorid</span><p>[{</p><p>"paper_id":"60190",</p><p>"title":"Pedagogical Strategies for Reflection in Project-based HCI Education with End Users."</p><p>}]</p></div>
<div><span>award</span><p>[{</p><p>"paper_id":"60192",</p><p>"title":"A Taxonomy of Sounds in Virtual Reality",</p><p>"name":"Best paper"</p><p>}]</p></div>',

                '<p>{</p><p>"message": "ok",</p><p>"count": 1,</p><p>"results": {</p>
<p>"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJleHAiOjE2NTAxMjA5NjR9.GecEv0OGERlqYI-UUq8rXQDRE6NZAcmKmc4rlPmO-3Q"</p><p>}</p><p>}</p>',
                '<p>{</p><p>"message": "ok",</p><p>"count": 2,</p><p>"results":[</p><p>{</p>
            <p>"paper_id": "60071"</p><p>},</p><p>{</p><p></p> <p>"paper_id": "60075"</p><p>}</p><p>]}</p>'

            )
        );

        $page = new DocumentationPage("Coursework - DIS Research Papers", ["home"=>"Home", "documentation"=>"Documentation"],"Designing Interactive Systems");
        $block = <<<EOT
	<main id="mainGrid">
				<div class="imgBG">
				</div>
				<div class="index">
EOT;
        $page->addBlock($block);
        //aside nav bar to navigate API documentation
        $page->addApiNav($endpoints);
        $page->addBlock("<div id='mainContent'>");
        $page->addHeading2("Documentation Page");
        $page->apiInfo($endpoints);

        $block = <<<EOT
					</div>
EOT;
        $page->addBlock($block);
        $page->studentDetails("Martina Pani", "w19020174");
		$block = <<<EOT
				</div>		
			</main>
EOT;
        $page->addBlock($block);
        return $page->generateWebpage();
    }
}