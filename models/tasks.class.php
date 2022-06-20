<?php

class Task {

public $taskName;
public $completed;
public $error;
public $success;
public $db = "db/tasks.json";
public $tasksArray;
public $newTask; 
public $date;
public $time;

function __construct ($username, $taskName, $completed = false) {
    $this->username = $username;
    $this->db = "db/tasks." . $username . ".json";
    $this->date = date('Y-m-d');
	$this->time = date('H:i:s');
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
        'time' => $this->time,
        'taskname' => $this->taskName,
        'completed' => $this->completed
        ];
    
    }



public function addTask() {
    
    if(!$this->tasknameExists()) {
        $this->tasksArray[]=($this->newTask);
        $json = json_encode($this->tasksArray, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json);
    } 
    else
    {
    $this->displayResult();
    }
}



public function delTask($taskname) {
        
        $task = $taskname;
        $data = file_get_contents($this->db);
        $json = json_decode($data, true);
        foreach($json as $j => $i) {
        if($i['taskname'] == $task){
        unset($json[$j]);
        }
   
        }
     
        $json = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json); 
}





public function markTask($taskname) {
        $tn = NULL;
        //$json = json_decode(file_get_contents($this->db), true);
        //foreach($json as &$j) { 
        if($this->tasknameExists()){
            $j['completed']=!$j['completed'];
            $tn = $j['taskname'];
            }
            //}
            //$json = json_encode($json, JSON_PRETTY_PRINT);
            //file_put_contents($this->db, $json); 
            //unset($j);
            return $tn;
            }

 
public function displayTask($taskName) {
        $this->taskName = $taskName;

if ($this->tasknameExists()){

    
}

}



//support func 

public function tasknameExists() {

         foreach($this->tasksArray as $task) {
        if($this->taskName == $task['taskname']) {
        //$this->msg = "This task already exists!";
        return true;
    
         }
}
}

public function displayResult(){
    echo "<h3 class='text-xl text-center text-white font-bold'>$this->msg</h3>"; 
    echo "<br  />";
}

}
