<?php

  class SignupController extends Controller {
 
   public function __construct() {
    parent::__construct();
   
    $this->view->msg = 'signup controller';
    $this->view->render('signup/index');
   }
  }

