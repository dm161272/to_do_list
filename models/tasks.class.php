<?php

class Task {

private $taskName;
private $completed;
public $error;
public $success;
private $db = "db/tasks.json";
private $tasksArray;
private $newTask; 

function __construct ($username, $taskName, $completed = false) {
    $this->username = $username;
    $this->db = "db/tasks." . $username . ".json";
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
        'taskname' => $this->taskName,
        'completed' => $this->completed
        ];
    
    
        //$this->addTask();
    
    }


public function addTask() {
    
    if(!$this->tasknameExists()) {
        array_push($this->tasksArray, $this->newTask);
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
        $task = $taskname;
        $data = file_get_contents($this->db);
        $json = json_decode($data, true);
        foreach($json as $j => $i) {
            //var_dump($j);
            //echo "***<br>";
            //var_dump($i);
        if(($i['taskname'] == $task && $json[$j]['completed']==false)){
            $json[$j]['completed']=true;
        }

        }
        $json = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json); 

        return $ret=true;
        
    }

    public function unmarkTask($taskname) {
        $task = $taskname;
        $data = file_get_contents($this->db);
        $json = json_decode($data, true);
        foreach($json as $j => $i) {
            //var_dump($j);
            //echo "---<br>";
            //var_dump($i);
        if(($i['taskname'] == $task && $json[$j]['completed']==true)){
            $json[$j]['completed']=false;

        }

        }
        $json = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json); 
        
        return $ret = false;
    }
    



//support func 

public function tasknameExists() {

         foreach($this->tasksArray as $task) {
        if($this->taskName == $task['taskname']) {
        $this->msg = "This task already exists!";
        return true;
    
         }
}
}

private function displayResult(){
    echo "<h3 class='text-xl text-center text-white font-bold'>$this->msg</h3>"; 
    echo "<br  />";
}

}
