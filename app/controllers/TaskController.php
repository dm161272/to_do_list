<?php
  class TaskController extends Controller {
    
    private $nt;
   
    public function indexAction(){

      return $this->markTask();

    }


    public function markTask(){

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
<<<<<<< HEAD:app/controllers/TaskController.php
    return $this->tasksArray;
    
    }
    else 
    {
    return false;
    }
    
  }


}
=======
      return $this->tasksArray;
      }
      else {
      return false;
      }
  }
  }
>>>>>>> master:app/controllers/TasksController.php
