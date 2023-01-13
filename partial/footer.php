<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2023 Layanan RT App.</strong> All rights reserved.
</footer>
<script>
  $(function() {
    <?php if(@$toastr_success): ?>
    toastr.success('<?= $toastr_success ?>');
    <?php endif ?>
    <?php if(@$toastr_error): ?>
    toastr.error('<?= $toastr_error ?>');
    <?php endif ?>
  });
</script>