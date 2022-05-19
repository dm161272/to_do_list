<?php


$taskName = $_POST['task_name'] ?? "";
$taskName = trim($taskName);

if($taskName) {
    if(file_exists('tasks.json')) {
    $json = file_get_contents('tasks.json');
    $jsonArray = json_decode($json, true);
    }
    else {
        $jsonArray = [];
    }

    $jsonArray[$taskName] = ['completed' => false];
   
    file_put_contents('tasks.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}


header('location: new_task.php');