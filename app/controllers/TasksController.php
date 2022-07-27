<?php




  class TasksController extends Controller {
    

     public function indexAction(){
      
      $this->displayTasks();

    if(isset($_POST['addtask'])){
      $taskname=filter_var(trim($_POST['taskname']));
      $endDate=$_POST['endDate'];
      $nt=new Task($endDate, $_SESSION['user'], $taskname);
      $nt->addTask();
    }
      
    if(isset($_POST['deltask'])){
      $taskname=$_POST['deltask'];
     
      $this->delTask($taskname);
      
      
    }


    if(isset($_POST['marktask'])){
      $taskname=$_POST['marktask'];
      
      $_SESSION['nt']->markTask($taskname);
    }

  }

  public function displayTasks() {

    if(file_exists($tr=ROOT_PATH . "/db/tasks." . $_SESSION['user'] . ".json")) {
        
    $tasksArray=json_decode(file_get_contents($tr), true);
 
    }

        foreach($tasksArray as $task) {
  
              $_SESSION['taskname'] = $task['taskname'];
           
        switch ($task['completed']){  
       
        case 1:
              $_SESSION['button_color']="orange";
              $_SESSION['button_text']="Proceeding";
              break;
        case 2:
              $_SESSION['button_color']="teal";
              $_SESSION['button_text']="Done";
              break;
        default:
              $_SESSION['button_color']="red";
              $_SESSION['button_text']="Not done";
              }
  
        }
    }

  }
?>