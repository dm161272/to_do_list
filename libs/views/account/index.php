
<?php


if(!isset($_SESSION['user'])) {

    header("location: signup"); 
    exit();
}

if(isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("location: signup"); 
    exit();
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

<div>
 
<h2>Welcome <?php echo $_SESSION['user']; ?></h2>
<a href="?Logout">Log out></a>

</div>


</body>
</html>


