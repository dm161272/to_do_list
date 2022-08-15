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
    if($this->taskDate() && !$this->tasknameExists()) {

        $_SESSION['msg']="Task end date can not be before today!"; 
    }
    else {
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

}

//support func 

public function tasknameExists() {
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

}



