
<?php
 
 $tasks = [];
 if(file_exists('tasks.json')) {
 $json = file_get_contents('tasks.json');
 $tasks = json_decode($json, true);
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    
<form action = "new_task_add.php" method = "post">
<input type = "text" name = "task_name" placeholder = "Enter new task">
<button>Add task</button>

</form>

<br>

<?php

foreach($tasks as $taskName => $task): ?>

<div style = "margin-bottom: 20px;">
    <input type = "checkbox" <?php echo $task['completed'] ? 'checked' : '' ?>>
    <?php echo $taskName; ?>

    
    <form style = "display: inline-block" action = "delete_task.php" method = "POST">
        <input type = "hidden" name = "task_name" value = "<?php echo $taskName ?>">
      
    <button>Delete task</button>
    </form>
</div>

<?php
endforeach;
?>

</body>


</html>