<?php
  require_once 'database.php';

  $post = $_POST;
  
  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '".$post['username']."' and password = '".md5($post['password'])."'");

  if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_array($result);
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['level'] = $user['level'];
    header('Location: index.php');
  }
  else{
    header('Location: '.$_SERVER['HTTP_REFERER'].'?error=Wrong Username & Password!');
  }
?>