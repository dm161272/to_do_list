<?php

  class SignoutController extends Controller {
 
   public function __construct() {
    parent::__construct();
   
    $this->view->msg = 'signout controller';
    $this->view->render('signout/index');
   }
  }

