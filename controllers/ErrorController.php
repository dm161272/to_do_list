<?php

  class ErrorController extends Controller {
   public function __construct() {

    $this->view=new View();
    $this->view->msg = 'Page does not exists!';
    $this->view->render('error/index');
   }
  }
?>