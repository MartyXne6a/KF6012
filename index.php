<?php
/**
 * Single Point of Entry.
 * All requests to the server will be redirected to index.php
 */
include 'config/config.php';

$request = new Request();
$path = $request->getPath();

// set htmlExceptionHandler as exception handler if a human-readable HTML page
// is to be produced
if(substr($path,0,3) !== 'api'){
    set_exception_handler('htmlExceptionHandler');
}

// Generate a JSON response if the request is to access an endpoint
// otherwise generate an HTMl response
$response = (substr($request->getPath(),0,3) === "api")
    ? new JSONResponse()
    : new HTMLResponse();

switch ($request->getPath()) {
    case '':
    case 'home':
        $controller = new HomeController($request, $response);
        break;
    case 'documentation':
        $controller = new DocumentationController($request, $response);
        break;
    case 'api':
        $controller = new ApiBaseController($request, $response);
        break;
    case 'api/authors':
        $controller = new ApiAuthorsController($request, $response);
        break;
    case 'api/papers':
        $controller = new ApiPapersController($request, $response);
        break;
    case 'api/authenticate':
        $controller = new ApiAuthenticationController($request, $response);
        break;
    case 'api/readinglist':
        $controller = new ApiReadingListController($request, $response);
        break;
    default:
        if (substr($request->getPath(),0,3) === "api") {
            $controller = new ApiErrorController($request, $response);
        } else {
            $controller = new ErrorController($request, $response);
        }
        break;
}

echo $response->getData();