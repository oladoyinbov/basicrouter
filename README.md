# php-static-router
PHP Basic and Static Router


# Install
Requires PHP 7.4 or newer.

# Usage
Here's a basic usage example:

`` Set Your Website Url Via "Config/site.php``

Defining Routes:

`` Navigate to "config/routes.php" to start defining your routes ``

Basic Usage:

`` 
/**
 * Routing System By FosterPHP
 * 
 * @param string $destination
 * 
 * @param ?string|callable $callback
 */

// For Request With Static Pages
$route->get('/', 'index');

// For Get Requests With Callback
$route->get('/callback', function(){
    echo "Callback Test";
});

//POST Requests
$route->post('/demo', function(){
    echo "POST Request Test";
});

// PUT Request
$route->put('/demo', function(){
    echo "PUT Request Test";
});

// Delete Request
$route->delete('/demo', function(){
    echo "DELETE Request Test";
});

// For [GET, POST, PUT, DELETE] Requests
$route->any("/404", "404");

``

