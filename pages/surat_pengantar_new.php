<?php
  $post = $_POST;
  
  if($post['submit']){
    $nik = $post['nik'];
    $alasan = $post['alasan'];
    $keterangan = $post['keterangan'];
    $created_by = $_SESSION['id'];

    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE nik = '$nik'");
    if(mysqli_num_rows($result) == 0){
      $toastr_error = 'Error: NIK Not Found!';
    }

    if(!@$toastr_error){
      $result = mysqli_query($mysqli, "INSERT INTO surat_pengantar(nik,alasan,keterangan,created_by) VALUES('$nik','$alasan','$keterangan','$created_by')");
  
      $toastr_success = 'Success: Surat Pengantar Has Been Created!';
    }

  }
?>
<section class="content  mt-3">

  <form method="post" action="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Surat Pengantar</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" class="form-control" name="nik" placeholder="NIK" required>
        </div>
        <div class="form-group">
          <label>Alasan</label>
          <input type="text" class="form-control" name="alasan" placeholder="Alasan" required>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <button type="submit" name="submit" value="create" class="btn btn-success"><i class="fas fa-plus"></i> Create</button>
          </div>
          <div class="col text-right">
            <a href="index.php?page=surat_pengantar_list" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</section>