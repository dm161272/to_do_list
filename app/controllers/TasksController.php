<?php
  class TasksController extends Controller {
    
    private $nt;
   
     public function indexAction(){

    if(isset($_POST['addtask'])){
      $taskname=filter_var(trim($_POST['taskname']));
      $endDate=$_POST['endDate'];
      $this->nt=new Task($endDate, $_SESSION['user'], $taskname);
      $this->nt->addTask();
 
    }

    if(isset($_POST['deltask'])){
      $taskname=$_POST['deltask'];
      $this->nt = new Task('', $_SESSION['user'], $taskname);
      $this->nt->delTask($taskname);
      
    }

    if(isset($_POST['marktask'])){
      $this->taskname=$_POST['marktask'];
      $this->nt = new Task('', $_SESSION['user'], $this->taskname);
      $this->nt->markTask($this->taskname);

    }

  }
  
    public function tasksArray() {

      if(file_exists($this->tr=ROOT_PATH . "/db/tasks." . $_SESSION['user'] . ".json")) {
      $this->tasksArray=json_decode(file_get_contents($this->tr), true);
      return $this->tasksArray;
      }
      else {
      return false;
      }
  }
  }
