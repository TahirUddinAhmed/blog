<?php
// Router login

if(array_key_exists($uri, $routes)) {
    require basePath($routes[$uri]);
} else {
    // require the 404 error page
    http_response_code(404);
    require basePath($routes['404']);
}