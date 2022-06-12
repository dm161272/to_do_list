<?php
class LoginUser {

private $userName;
private $password;
public $result;
private $db = "db/users.json";
private $usersArray;


    public function __construct($userName, $password) {
    $this->userName = $userName;
    $this->password = $password;
    $this->usersArray = json_decode(file_get_contents($this->db), true);
    //$this->login();
}


public function login(){
    foreach($this->usersArray as $user) {
    $bool = false;
    if(($user['username'] == $this->userName) && (password_verify($this->password, $user['password'])))
    {
    $_SESSION['user'] = $this->userName;
    return true;
    }
   
}
}


//public function getLogin() {  
//return $_SESSION['user'];

//}

}
