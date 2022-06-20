<?php

  class SignupController extends Controller {
 
   public function __construct() {
   
    $this->view=new View();
    $this->view->msg = 'signup controller';
    $this->view->render('signup/index');
   }
  }

