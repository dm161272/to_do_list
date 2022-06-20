<?php

class Bootstrap {
 

public function __construct() {
  $url = isset($_GET['url']) ? $_GET['url'] : 'index'; 
  
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    $file = 'controllers/'.ucfirst($url[0]).'Controller.php';

    if(file_exists($file)) {
     require $file;
    } else {
     require 'controllers/ErrorController.php';
     $controller = new ErrorController();
     return false;
    }
    
    $controller = new (ucfirst($url[0]).'Controller');
    //$controller->index();

    if(isset($url[2])) {
      $link1 = $url[1];
      $link2 = $url[2];
      $controller->$link1($link2);
    } else {

    if(isset($url[1])) {
      $link = $url[1];
      $controller->$link(); 
     }
    }
   }
  }
