<?php

  class TasksController extends Controller {
   public function __construct() {
   parent::__construct();
  
    $this->view->msg = 'tasks controller';
    $this->view->render('tasks/index');


   }
  }
?>