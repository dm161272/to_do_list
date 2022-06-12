
<?php
//session_start();

$user=$_SESSION['user'];
$taskname='';
$ts='';
$ob='';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple todo</title>
</head>
<body>
<div class="w-full text-center my-5">
          <div class="w-3/4 mx-auto">
                <label class="text-white text-xl font-bold" for="username">Welcome user: <?php echo $user;?>!</label>
            
        <form class="my-5" action="" method="POST" id="input-form">

                <input class="w-3/4 shadow appearance-none border rounded  text-gray-700 leading-tight my-2 mx-2 py-2 px-3
                focus:outline-none focus:shadow-outline" id="taskname" type="text" placeholder="enter task name" name="taskname" required>
      
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none
                focus:shadow-outline my-2 mx-2 py-2 px-3" type="submit" value="Add task" name="addtask">
        </form>
          </div>
          </div>

<?php 
    if(isset($_POST['addtask'])){
        $taskname=filter_var(trim($_POST['taskname']), FILTER_SANITIZE_STRING);
        $nt=new Task($user, $taskname);
        $_SESSION['object']=$nt;
        $nt->addTask();
    }
?>
    <div class="w-3/4 my-auto mx-auto">
    <div class="flex flex-wrap w-full text-white font-bold border rounded">
        
<?php       
      if(file_exists($tr="db/tasks." . $user . ".json")) {
          
      $tasksArray=json_decode(file_get_contents($tr), true);
      
      foreach($tasksArray as $task): 
       
      $taskname=$task['taskname'];
?> 
          <form class="w-2/12 text-center my-auto" action="" method="POST" id="form2">
          <input type="hidden" name="marktask" value="<?php echo $taskname ?>">
          <button class="bg-green-500 hover:bg-green-700 font-bold py-2 px-3 rounded focus:outline-none
                focus:shadow-outline my-2 mx-5">Done</button>

          </form> <form class="w-2/12 text-center my-auto" action="" method="POST" id="form2">
          <input type="hidden" name="unmarktask" value="<?php echo $taskname ?>">
          <button class="bg-red-500 hover:bg-red-700 font-bold py-2 px-3 rounded focus:outline-none
                focus:shadow-outline my-2 mx-5">Not done</button>
          </form>
          <div class="mx-auto w-6/12 text-left my-auto">
          <?php echo $taskname . ": "; ?>
      
          <?php if($task['completed']) {echo "task completed";} else {echo "task not completed";}?>
          </div>
          <form class="w-2/12 text-left" action="" method="POST">
          <input type="hidden" name="deltask" value="<?php echo $taskname?>">
          <button class="bg-red-500 hover:bg-red-700 font-bold py-2 px-3 rounded focus:outline-none
                focus:shadow-outline my-2 mx-5">Delete</button>
          </form>
          
        <?php endforeach;}?>

    </div>
    </div>

    <?php 
    
    if(isset($_POST['deltask'])){
      $ts=($_POST['deltask']);
      $ob=($_SESSION['object']);
      $ob->delTask($ts);
     
    }

      if(isset($_POST['unmarktask'])){
        $ts=($_POST['unmarktask']);
        $ob=($_SESSION['object']);

        $status=($ob->unmarkTask($ts));
        $_SESSION['mark']=$status;
    }

      if(isset($_POST['marktask'])){
        $ts=($_POST['marktask']);
        $ob=($_SESSION['object']);

        $status=($ob->markTask($ts));
        $_SESSION['mark']=$status;
    }

  
    
  
?>

</body>
</html>


      