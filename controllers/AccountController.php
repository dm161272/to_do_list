<?php

  class AccountController extends Controller {
   public function __construct() {
    parent::__construct();
    $this->view->msg = 'account controller';
    $this->view->render('account/index');

   }
  }
?>