<?php
  $id_masyarakat = $_GET['id'];
  $masyarakat = mysqli_query($mysqli, "DELETE FROM masyarakat WHERE id = '$id_masyarakat'");
  header('Location: '.$_SERVER['HTTP_REFERER']);
?>