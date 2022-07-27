<?php
class Task {

private $taskName;
private $completed;
private $db;
private $tasksArray;
private $newTask; 
private $date;


function __construct ($username, $taskName, $completed = '0') {
    $this->date = date('d-M-Y h:i:s');
    $this->username = $username;
    $this->db = ROOT_PATH . "/db/tasks." . $username . ".json";
    $this->taskName = $taskName;
    $this->completed = $completed;
    if(!file_exists($this->db))
    {
      $this->tasksArray = [];
    }
    else
    {
        $this->tasksArray = json_decode(file_get_contents($this->db), true);
    }
    $this->newTask = [
        'date' => $this->date,
        'taskname' => $this->taskName,
        'completed' => $this->completed
        ];  
    }


public function addTask() {   
    $_SESSION['check']=false;
    if(!$this->tasknameExists()) {
        $this->tasksArray[]=$this->newTask;
        $json = json_encode($this->tasksArray, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json);
    } 
    else
    {
    $_SESSION['msg']="This task already exists!";
    }
}


public function delTask($taskname) {     
        $task = $taskname;
        $data = file_get_contents($this->db);
        $json = json_decode($data, true);
        foreach($json as $j => $i) {
        if($i['taskname'] === $task){
            unset($json[$j]);
        }
        }
        $json = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json); 
    }



public function markTask($taskname) {

        $data = file_get_contents($this->db);
        $json = json_decode($data, true);

        foreach($json as $j => $i) {
        if ($i['taskname'] === $taskname) {

            switch ($json[$j]['completed']) {

            case 0:
            $json[$j]['completed'] = '1';
            break;

            case 1:
            $json[$j]['completed'] = '2';
            break;
            
            default:
            $json[$j]['completed'] = '0';

        }
      }   
    }
        $json = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json); 

        return $ret=true;
        
    
}

//support func 

public function tasknameExists() {
         foreach($this->tasksArray as $task) {
        if($this->taskName === $task['taskname']) {
        return true;
         }
         }
    }

public static function tasksArray() {

        if(file_exists($tr=ROOT_PATH . "/db/tasks." . $_SESSION['user'] . ".json")) {
            
        $tasksArray=json_decode(file_get_contents($tr), true);
  
        return $tasksArray;
  
        }
        else {
        return false;
        }
      
    }
}
