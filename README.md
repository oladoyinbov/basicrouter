# php-static-router
PHP Basic and Static Router


# Install
Requires PHP 7.4 or newer.

# Usage
Here's a basic usage example:

### Environment Setup: 

```php
Set Your Website Url Via "Config/site.php
```

### Defining Routes:  

```php
Navigate to "config/routes.php" to start defining your routes 
```

### Basic Usage:

Create Router Instance In "public/index.php" directory:

```php
<?php
declare(strict_types=1);
ERROR_REPORTING(E_ALL);

require_once realpath("../vendor/autoload.php");
use FosterRouter\Router\Router;

$route = new Router();
require $route->routepath("routes");
```
<br>

Request With Static Pages:   

```php
$route->get('/', 'index');
```
> Static Pages Can Be Created Via The "views" directory.  

<br>

### ``GET`` Requests With Callback: 

```php
$route->get('/callback', function(){
    echo "Callback Test";
});
```

### ``POST`` Requests: 
```php
$route->post('/demo', function(){
    echo "POST Request Test";
});
```


### ``PUT`` Request:

```php
$route->put('/demo', function(){
    echo "PUT Request Test";
});
```


### ``Delete`` Request:
```php
$route->delete('/demo', function(){
    echo "DELETE Request Test";
});
```

### ``[GET, POST, PUT, DELETE]`` Requests:
```php
$route->any("/404", "404");

```




