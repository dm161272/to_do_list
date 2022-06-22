<?php

class User {

private $userName;
private $rawPassword;
private $encryptPassword;
public $result;
public $msg;
//public $success;

private $db = "db/users.json";
private $usersArray;
private $newUser; 

public function __construct($userName, $userPassword) {
$this->userName = $userName;
$this->rawPassword = $userPassword;
$this->encryptPassword = password_hash($this->rawPassword, PASSWORD_DEFAULT);
if(!file_exists($this->db))
{
   $this->usersArray = [];
}
else
{
    $this->usersArray = json_decode(file_get_contents($this->db), true);
}
$this->newUser = [
    'username' => $this->userName,
    'password' => $this->encryptPassword
    ];
}


//add user func


public function addUser() {

    if(!$this->usernameExists()) {
        array_push($this->usersArray, $this->newUser);
        $json = json_encode($this->usersArray, JSON_PRETTY_PRINT);
        file_put_contents($this->db, $json);

    $this->msg = "User successfully registered!";
    
}
    $this->displayResult();
}


//user login func
public function login($pwd){
    foreach($this->usersArray as $user) {
    if(($this->userName==$user['username']) && (password_verify($pwd, $user['password'])))
    {
    $_SESSION['user'] = $this->userName;
    return true;
    }
}
}

//support func 

private function usernameExists() {
    $checker=false;
    //$this->usersArray = json_decode(file_get_contents($this->db), true);
    foreach($this->usersArray as $user) {
            if($this->userName == $user['username']) {
     $this->msg = $this->userName ." - username is already in use!";
            $checker = true;}  
        else
        {
        $checker = false;
        
        }
    }   echo $checker;
        return $checker;
    }

private function displayResult(){
    echo "<h3 class='text-xl text-center text-white font-bold'>$this->msg</h3>"; 
    echo "<br  />";
}

public static function signOut(){
$_SESSION = array();
session_destroy();
header('location: user');
}

}
