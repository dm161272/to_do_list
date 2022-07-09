<?php

  class IndexController extends Controller {
   public function __construct() {
    parent::__construct();
    $this->view->msg = 'inside controller INDEX';
    
    $this->view->render('index/index');

   }
  }
?>