<?php
declare(strict_types=1);
namespace FosterRouter\Router;

use FosterRouter\Router\ParseRouter;
use \FosterRouter\Helper as Request;



final class Router extends ParseRouter{
 
    public string $sep;
    public ?string $routepath;
    public string $destination;
    public $callback;
    


    public function __construct(){   }


/**
 * GET Route Function
 * 
 * @param string $destination
 * 
 * @param string|callable $callback
 * 
 * @return
*/ 
 


     public function get(string $destination, string|callable $callback){

        $this->req = new Request\CheckRequestMethod;
        $this->destination = $destination;
        $this->callback = $callback;

        if( $this->req->is_get_request() ){ parent::parse_route_requests($this->destination, $this->callback); }

    }


    public function post(string $destination, string|callable $callback){

        $this->req = new Request\CheckRequestMethod;
        $this->destination = $destination;
        $this->callback = $callback;

        if($this->req->is_post_request() ){ parent::parse_route_requests($this->destination, $this->callback); }

      }


    public function put(string $destination, string|callable $callback){

        $this->req = new Request\CheckRequestMethod;
        $this->destination = $destination;
        $this->callback = $callback;

        if( $this->req->is_put_request() ){ parent::parse_route_requests($this->destination, $this->callback); }  

      }


    public function patch(string $destination, string|callable $callback){

        $this->req = new Request\CheckRequestMethod;
        $this->destination = $destination;
        $this->callback = $callback;

        if( $this->req->is_patch_request() ){ self::parse_route_requests($this->destination, $this->callback); } 

      }


    public  function delete(string $destination, string|callable $callback){

        $this->req = new Request\CheckRequestMethod;
        $this->destination = $destination;
        $this->callback = $callback;

        if( $this->req->is_delete_request() ){ parent::parse_route_requests($this->destination, $this->callback); } 

      }


    public function any(string $destination, string|callable $callback){
        
        $this->destination = $destination;
        $this->callback = $callback;
        parent::parse_route_requests($this->destination, $this->callback); 
    
    }
        



        /**
     * Get All Routes Path 
     * 
     * @param string $path
     * 
     * @return mixed
     * 
     */


    public function routepath(string $path): mixed{

        $this->routepath = $path;

        return realpath(__DIR__.'/../../config/'.$this->routepath.'.php');

    }




 
   


}