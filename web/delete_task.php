<?php

$json = file_get_contents('tasks.json');
 $tasks = json_decode($json, true);

 echo $taskName; 
 $taskName = $_POST['task_name'];

 unset($jsonArray[$taskName]);

 file_put_contents('tasks.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

 
header('location: new_task.php');