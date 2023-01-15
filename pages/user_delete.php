<?php
  $id_user = $_GET['id'];
  $user = mysqli_query($mysqli, "DELETE FROM user WHERE id = '$id_user'");
  header('Location: '.$_SERVER['HTTP_REFERER']);
?>