<?php
class Task {

private $taskName;
private $completed;
private $db;
private $tasksArray;
private $newTask; 
private $date;
private $endDate;

function __construct ($endDate, $username, $taskName, $completed = '0') {
    $this->date = date('Y-m-d');
    $this->endDate = $endDate;
    $this->username = $username;
    $this->db = ROOT_PATH . "/db/tasks." . $this->username . ".json";
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
        'endDate' => $this->endDate,
        'taskname' => $this->taskName,
        'completed' => $this->completed
        ];  
    }


public function addTask() {   
    $_SESSION['check']=false;
<<<<<<< HEAD
    if(!$this->tasknameExists() && !$this->checkDate()) {
=======
    if($this->taskDate() && !$this->tasknameExists()) {

        $_SESSION['msg']="Ending date cannot be in the past!"; 
    }
    else {
    if(!$this->tasknameExists()) {
>>>>>>> master
        $this->tasksArray[]=$this->newTask;
        $json = json_encode($this->tasksArray, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json);
    } 
    else
    {
     ($this->tasknameExists()) ? $_SESSION['msg']="This task already exists!"
     :$_SESSION['msg']="Starting date can not be in the past!";
    }
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

        $json = file_get_contents($this->db);
        $json = json_decode($json, true);

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

}

//support func 

public function tasknameExists() {
<<<<<<< HEAD
         foreach($this->tasksArray as $task) {
        return ($this->taskName === $task['taskname']) ? true
        : false;
         }
    }

    public function checkDate() {
       return ($this->date >= $this->endDate) ? true
       : false;
        
   }
=======
        foreach($this->tasksArray as $task) {
        if($this->taskName === $task['taskname']) {
        return true;
         }
         }
    }

public function taskDate() {
       if($this->endDate < $this->date) {
       return true;
        }
    }
>>>>>>> master

}



