<?php

  class ErrorController extends Controller {
   public function __construct() {
    parent::__construct();
    $this->view->msg = 'Page does not exists!';
    $this->view->render('error/index');
   }
  }
?>