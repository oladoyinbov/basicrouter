<?php
/**
 * Routing System By FosterPHP
 * 
 * @param string $destination
 * 
 * @param ?string|callable $callback
 * 
 * @return RouteCallback
 */


$route->get('/', 'index');


$route->get('/callback', function(){
    echo "Callback Test";
});

$route->post('/demo', function(){
    echo "POST Request Test";
});

$route->put('/demo', function(){
    echo "PUT Request Test";
});

$route->delete('/demo', function(){
    echo "DELETE Request Test";
});


$route->any("/404", "404");
