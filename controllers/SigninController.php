<?php

  class SigninController extends Controller {
   public function __construct() {
    parent::__construct();
    $this->view->msg = 'signIN controller';
    $this->view->render('signin/index');

   }
  }
?>