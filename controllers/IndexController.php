<?php

  class IndexController extends Controller {
   public function __construct() {
    
    $this->view=new View();
    $this->view->msg = 'inside controller INDEX';
    $this->view->render('index/index');

   }
  }
?>