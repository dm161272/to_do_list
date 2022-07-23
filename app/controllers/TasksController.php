<?php

  class TasksController extends Controller {
    
   


     public function indexAction(){


    if(isset($_POST['addtask'])){
      $taskname=filter_var(trim($_POST['taskname']));
      $nt=new Task($_SESSION['user'], $taskname);
      $nt->addTask();
    }
      
    if(isset($_POST['deltask'])){
      $taskname=$_POST['deltask'];
      $nt=new Task($_SESSION['user'], $taskname);
      $nt->delTask($taskname);
      
      
    }


    if(isset($_POST['marktask'])){
      $taskname=$_POST['marktask'];
      $nt=new Task($_SESSION['user'], $taskname);
      $nt->markTask($taskname);
    }

    }
  

  }
?>