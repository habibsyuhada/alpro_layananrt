<?php
  $post = $_POST;
  $id_surat_pengantar = $_GET['id'];
  
  if($post['submit']){
    $nik = $post['nik'];
    $alasan = $post['alasan'];
    $keterangan = $post['keterangan'];

    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE nik = '$nik'");
    if(mysqli_num_rows($result) == 0){
      $toastr_error = 'Error: NIK Not Found!';
    }

    if(!@$toastr_error){
      $result = mysqli_query($mysqli, "UPDATE surat_pengantar SET nik='$nik', alasan='$alasan', keterangan='$keterangan' WHERE id=$id_surat_pengantar");
  
      $toastr_success = 'Success: User Has Been Created!';
    }

  }

  $surat_pengantar = mysqli_query($mysqli, "SELECT * FROM surat_pengantar WHERE id = '$id_surat_pengantar'");
  $surat_pengantar = mysqli_fetch_array($surat_pengantar);
?>
<section class="content  mt-3">

  <form method="post" action="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Surat Pengantar</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" class="form-control" name="nik" value="<?= $surat_pengantar['nik'] ?>" placeholder="NIK" required>
        </div>
        <div class="form-group">
          <label>Alasan</label>
          <input type="text" class="form-control" name="alasan" value="<?= $surat_pengantar['alasan'] ?>" placeholder="Alasan" required>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" class="form-control" name="keterangan" value="<?= $surat_pengantar['keterangan'] ?>" placeholder="Keterangan" required>
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