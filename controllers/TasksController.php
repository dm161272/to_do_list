<?php

  class TasksController extends Controller {
   public function __construct() {

    $this->view=new View();
    $this->view->msg = 'tasks controller';
    $this->view->render('tasks/index');


   }
  }
?>