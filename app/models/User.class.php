<?php

class User {

private $userName;
private $rawPassword;
private $encryptPassword;
public $result;
public $msg;
//public $success;

private $db=ROOT_PATH . "/db/users.json";
private $usersArray;
private $newUser; 

public function __construct($userName, $userPassword) {
$this->userName=$userName;
$this->rawPassword=$userPassword;
$this->encryptPassword=password_hash($this->rawPassword, PASSWORD_DEFAULT);
if(!file_exists($this->db))
{
   $this->usersArray=[];
   //mkdir($this->db, 0777, $recursive = true);
   //chown($this->db, "tim");
}
else
{
    $this->usersArray=json_decode(file_get_contents($this->db), true);
}
$this->newUser=[
    'username' => $this->userName,
    'password' => $this->encryptPassword
    ];
}


//add user func

public function addUser() {

    if(!$this->usernameExists()) {
        $this->usersArray[]=$this->newUser;
        $json=json_encode($this->usersArray, JSON_PRETTY_PRINT);
       // echo $this->db;
        //mkdir($this->db, $permissions = 0777, $recursive = true);
        file_put_contents($this->db, $json);

    $_SESSION['msg']="User successfully registered!";    
    }
    else {
        $_SESSION['msg']="Username is already in use!";
    }
}


//user login func
public function login($pwd){
    foreach($this->usersArray as $user) {
    if(($this->userName==$user['username']) && (password_verify($pwd, $user['password'])))
    {
    $_SESSION['user']=$this->userName;
    return true;
    }
    }
}

//signOut func
public function signOut(){
    $_SESSION=array();
    session_destroy();
    header('location: login');
    }


//support func 

private function usernameExists() {
    //$this->usersArray=json_decode(file_get_contents($this->db), true);
    foreach($this->usersArray as $user) {
            if($this->userName === $user['username']) {
           //echo  ('<br>' . $this->userName . '<br>'  . $user['username'] . '<br>');
        
            return true;
        }      
    }
    }
} 
