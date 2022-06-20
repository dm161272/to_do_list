<?php

  class SigninController extends Controller {
   public function __construct() {
     
    $this->view=new View();
    $this->view->msg = 'signIN controller';
    $this->view->render('signin/index');

   }
  }
?>