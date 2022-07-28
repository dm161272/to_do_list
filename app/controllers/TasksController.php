<?php


  class TasksController extends Controller {
    
   


     public function indexAction(){


    if(isset($_POST['addtask'])){
      $taskname=filter_var(trim($_POST['taskname']));
      $endDate=$_POST['endDate'];
      $nt=new Task($endDate, $_SESSION['user'], $taskname);
      $nt->addTask();
    }
      
    if(isset($_POST['deltask'])){
      $taskname=$_POST['deltask'];
      $nt=new Task($endDate = '', $_SESSION['user'], $taskname);
      $nt->delTask($taskname);
      
      
    }


    if(isset($_POST['marktask'])){
      $taskname=$_POST['marktask'];
      $nt=new Task($endDate = '', $_SESSION['user'], $taskname);
      $nt->markTask($taskname);
    }

    }
  

  }
?>