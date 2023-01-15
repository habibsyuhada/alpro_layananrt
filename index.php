<?php
  require_once 'database.php';
  if(!isset($_SESSION['id'])){
    header('Location: login.php');
  }
  $page = @$_GET['page'];
  if(!isset($_GET['page'])){
    $page = 'surat_pengantar_list';
  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'partial/header.php'; ?>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <?php include 'partial/topbar.php'; ?>

      <?php include 'partial/sidebar.php'; ?>

      <div class="content-wrapper">
        <?php @include 'pages/'.$page.'.php'; ?>
      </div>

      <?php include 'partial/footer.php'; ?>
    </div>

  </body>
</html>
