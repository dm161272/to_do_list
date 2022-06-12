<?php
//session_start();
//$msg = $_SESSION['message'];
//if (isset($_SESSION)) $msg = 'Successfully log out!';
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
        <div class="w-full text-center mx-auto">
        <h3 class="text-xl text-white font-bold"><?php //echo $msg; ?></h3>
        </div>

<div class="h-2/4 max-w-max w-full text-center mx-auto">
 
        <form class="rounded px-8 pt-6 pb-8 mb-4" action="" method="POST" id="signup-form">
          
            <div>
                <label class="block text-white text-sm font-bold mb-4" for="username">Username</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 mb-3 text-gray-700 leading-tight 
                focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="username" name="username" required>
            </div>
            <div class="mt-4 mb-2">
                <label class="block text-white text-sm font-bold mb-4" for="password">Password</label>
                <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 
                leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="**********" name="pwd" required>
            </div>

            <div class="flex flex-row justify-between">
                 
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none
                focus:shadow-outline" type="submit" value="Sign In" name="signin">
                
                <input class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded focus:outline-none
                focus:shadow-outline" type="submit" value="Sign Up" name="signup">
            
            </div>
          <!--  <div  class="text-white text-sm font-bold text-right my-5">
                <a class="href="signout">Sign out</a>
            </div> -->
</div>
        </form>
          

<?php 

    if(isset($_POST['signin'])){
        if (!isset($_SESSION)) session_start();
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $pwd = filter_var(trim($_POST['pwd']), FILTER_SANITIZE_STRING);
        $nu = new LoginUser($username, $pwd);
        if ($nu->login()) {
        header('location: tasks');
        }
        else 
        {
        echo "<h3 class='text-xl text-center text-white font-bold'>Wrong username or password!</h3>";
        }
    }

    if(isset($_POST['signup'])){
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $pwd = filter_var(trim($_POST['pwd']), FILTER_SANITIZE_STRING);
        $ru = new RegisterUser($username, $pwd);
        $ru->addUser();
    }
   

?>

