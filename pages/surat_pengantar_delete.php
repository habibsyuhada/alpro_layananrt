<?php
  $id_surat_pengantar = $_GET['id'];
  $surat_pengantar = mysqli_query($mysqli, "DELETE FROM surat_pengantar WHERE id = '$id_surat_pengantar'");
  header('Location: '.$_SERVER['HTTP_REFERER']);
?>