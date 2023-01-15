<?php
  $id_surat_pengantar = $_GET['id'];
  $approve_by = $_SESSION['id'];
  $approve_date = date('Y-m-d H:i:s');
  $surat_pengantar = mysqli_query($mysqli, "UPDATE surat_pengantar SET status = 'Ditolak', approve_by = $approve_by, approve_date = '$approve_date' WHERE id = '$id_surat_pengantar'");
  header('Location: '.$_SERVER['HTTP_REFERER']);
?>