<?php

  class UserController extends Controller {
 
  
  public function indexAction(){

  if(isset($_POST['signin'])){
      if (!isset($_SESSION)) session_start();
      $username = filter_var(trim($_POST['username']));
      $pwd = filter_var(trim($_POST['pwd']));
      $newuser = new User($username, $pwd);
      $_SESSION['username'] = $username;
      $_SESSION['user'] = $newuser;
      if ($newuser->login($pwd)) {
      header('location: tasks');
      }
      else 
      {
        $_SESSION['msg']="Wrong username or password!";
      }
  }

  if(isset($_POST['signup'])){
      $username = filter_var(trim($_POST['username']));
      $pwd = filter_var(trim($_POST['pwd']));
      $newuser = new User($username, $pwd);
      $newuser->addUser();
  }
 
  if(isset($_POST['signout'])){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $newuser = new User($username, $pwd);
    $newuser->signOut();
  }
  }
}