<?php
  require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'partial/header.php'; ?>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <?php include 'partial/topbar.php'; ?>

      <?php include 'partial/sidebar.php'; ?>

      <div class="content-wrapper">
        <?php @include 'pages/'.$_GET['page'].'.php'; ?>
      </div>

      <?php include 'partial/footer.php'; ?>
    </div>

  </body>
</html>
