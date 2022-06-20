<?php

  class SignoutController extends Controller {
 
   public function __construct() {
   
    $this->view=new View();
    $this->view->msg = 'signout controller';
    $this->view->render('signout/index');
   }
  }

