<?php

  class UserController extends Controller {
 
   public function __construct() {
    parent::__construct();
   
    $this->view->msg = 'user controller';
    $this->view->render('user/index');
   }
  }

