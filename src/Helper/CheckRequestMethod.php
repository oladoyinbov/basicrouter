<?php
declare(strict_types=1);
namespace FosterRouter\Helper;


class CheckRequestMethod{

/**
 * All Supported Request Methods
 * 
 * @param static array $alltypes
 */
    public static array $alltypes = [
        "GET",
        "POST",
        "PUT",
        "DELETE",
    ];



    /**
     * Check if is GET request
     * 
     * @return bool
     */
    public function is_get_request(): bool{

         if( $_SERVER["REQUEST_METHOD"] === self::$alltypes[0] ){ return true; }else{ return false; }

    }

    
    /**
     * Check if is POST request
     * 
     * @return bool
     */
    public function is_post_request(): bool{

        if( $_SERVER["REQUEST_METHOD"] === self::$alltypes[1] ){ return true; }else{ return false; }

    }

    
    /**
     * Check if is PUT request
     * 
     * @return bool
     */
    public function is_put_request(): bool{

        if( $_SERVER["REQUEST_METHOD"] === self::$alltypes[2] ){ return true; }else{ return false; }

    }

    
    /**
     * Check if is DELETE request
     * 
     * @return bool
     */
    public function is_delete_request(): bool{

        if( $_SERVER["REQUEST_METHOD"] === self::$alltypes[3] ){ return true; }else{ return false; }

    }



}