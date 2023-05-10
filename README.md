# php-static-router
PHP Basic and Static Router


# Install
Requires PHP 7.4 or newer.

# Usage
Here's a basic usage example:

### Environment Setup: 

```php
Set Your Website Url Via "Config/site.php"
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

use FosterRouter\Router\Router;

require_once realpath("../vendor/autoload.php");

$route = new Router();
require $route->routepath("routes");
```
<br>


#### Directory Structure:

```
├── config                  # Configuration files (routes.php, site.php)
├── public                  # Web server files (index.php)
├── src                     # PHP source code (The App namespace)
│   ├── Helper              # Helper files
│   ├── Router              # Router classes
├── views                   # Static view files
│   ├── index.php           # Index Page
│   ├── 404.php             # 404 Page

```


#### Request With Static Pages:   

```php
$route->get('/', 'index');
```
> Static Pages Can Be Created Via The "views" directory.  
> `index` will be automatically converted to "views/index.php"

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




