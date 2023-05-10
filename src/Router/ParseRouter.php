<?php
declare(strict_types=1);
namespace FosterRouter\Router;

use \FosterRouter\Helper\Views as ViewsHelper;
use FosterRouter\Router\Router as Router;


class ParseRouter{

    /**
     * User Route Destination
     * 
     * @return string
     */
    public string $destination;



    /**
     * Callback Function | String When Page is Loaded
     * 
     * @return string|callable
     */
    public $callback;




    /**
     * Process Route Requests
     * 
     * @param ?string $destination 
     * @param string|callable $callback
     * 
     * @return Request
     */   


  public function parse_route_requests(?string $route, string|callable $callback){

    $this->callback = $callback;
    $this->route = $route;
    $this->router_instance = new Router();

    
      if( !is_callable($this->callback) ){
        if(strpos($this->callback, '.php')){
          preg_replace('/^[.php]/', '', $this->callback);
        }

      }

      include __DIR__.'/../../config/site.php';
      $this->request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
      $this->request_url = rtrim($this->request_url, '/');
      $this->request_url = strtok($this->request_url, '?');
      $this->route_parts = explode('/', $this->route);
      $this->request_url_parts = explode('/', $this->request_url);
      array_shift($this->route_parts);
      array_shift($this->request_url_parts);

      $this->check_http = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
      $this->full_request_url = $this->check_http.$_SERVER['HTTP_HOST'].$this->request_url;
      $this->app_url = filter_var($SITE["APP_URL"], FILTER_SANITIZE_URL);
 

       // Get and Parse Url
       $this->basename = trim(rtrim($this->check_http.$_SERVER['HTTP_HOST'].$this->request_url, '/'));
       $this->route = trim(rtrim($SITE["APP_URL"].$this->route, '/'));


      // Check One For Default Static Router
     if($this->route === $this->basename && isset($this->callback)){

        // Callback function
        if( is_callable($this->callback) ){
          call_user_func_array($this->callback, []);
          exit();
        }

        self::viewspath($this->callback);
        exit();
      }  


       // Not Used
      if( $this->route_parts[0] === '' && count($this->request_url_parts) === 0 ){

        if( is_callable($this->callback) ){
          call_user_func_array($this->callback, []);
          exit();
        }

         include_once realpath(self::viewspath($this->callback));;
         exit();
      }
    
    
       // For Default Routes With Variable Parameters
      if( count($this->route_parts) !== count($this->request_url_parts) ){ return; }  

      $this->parameters = [];

      for( $__i__ = 0; $__i__ < count($this->route_parts); $__i__++ ){
        $this->route_part = $this->route_parts[$__i__];

        if( preg_match("/^[:]/", $this->route_part) ){
          $this->route_part = ltrim($this->route_part, ':');
          array_push($this->parameters, $this->request_url_parts[$__i__]);
          $$this->route_part=$this->request_url_parts[$__i__];
        }
        elseif( $this->route_parts[$__i__] !== $this->request_url_parts[$__i__] ){
          return;
        } 

      }
    
    
      // Callback function
      if( is_callable($this->callback) ){
        call_user_func_array($this->callback, $this->parameters);
        exit();
      }    


      include_once realpath(self::viewspath('404'));

      exit();

      }    



/*
|--------------------------------------------------------------------------
| Default Route View Template
|--------------------------------------------------------------------------
| @param string $path
|
*/


    public function viewspath(string $path){

        $this->routepath = $path;
        $this->viewshelper = new ViewsHelper;
        $this->viewshelper->parse_views($this->routepath);

    }
  



}
      

