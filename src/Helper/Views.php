<?php
namespace FosterRouter\Helper;

/**
 * Basic Helper For Displaying Views Templates
 * 
 * @param string $filename
 * 
 * @return
 */

trait ViewsHelper{


    public function parse_views(?string $filename){


        $this->filename = $filename;

        $this->filename = strpos($this->filename, '.php') 
        ? htmlentities($this->filename)
        : htmlentities($this->filename).'.php';

        include __DIR__.'/../../views/'.$this->filename;
        
    }  


 }



 class Views{

  public ?string $filename;

  use ViewsHelper;

 }