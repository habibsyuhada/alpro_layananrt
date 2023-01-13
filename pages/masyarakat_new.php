<?php
  $post = $_POST;
  
  if($post['submit']){
    $nik = $post['nik'];
    $no_kk = $post['no_kk'];
    $nama = $post['nama'];
    $tempat_lahir = $post['tempat_lahir'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $jenis_kelamin = $post['jenis_kelamin'];
    $status_perkawinan = $post['status_perkawinan'];
    $agama = $post['agama'];
    $pekerjaan = $post['pekerjaan'];
    $kewarganegaraan = $post['kewarganegaraan'];
    $alamat = $post['alamat'];

    $result = mysqli_query($mysqli, "SELECT * FROM masyarakat WHERE nik = '$nik'");
    if(mysqli_num_rows($result) > 0){
      $toastr_error = 'Error: Duplicate NIK!';
    }

    if(!@$toastr_error){
      $result = mysqli_query($mysqli, "INSERT INTO masyarakat(nik,no_kk,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,status_perkawinan,agama,pekerjaan,kewarganegaraan,alamat) VALUES('$nik','$no_kk','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$status_perkawinan','$agama','$pekerjaan','$kewarganegaraan','$alamat')");
  
      $toastr_success = 'Success: Masyarakat Has Been Created!';
    }

  }
?>
<section class="content  mt-3">

  <form method="post" action="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create New Masyarakat</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" class="form-control" name="nik" placeholder="NIK" required>
        </div>
        <div class="form-group">
          <label>No KK</label>
          <input type="text" class="form-control" name="no_kk" placeholder="No KK" required>
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama" required>
        </div>
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select class="form-control" name="jenis_kelamin" required>
            <option>---</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status_perkawinan" required>
            <option>---</option>
            <option value="Lajang">Lajang</option>
            <option value="Menikah">Menikah</option>
          </select>
        </div>
        <div class="form-group">
          <label>Agama</label>
          <input type="text" class="form-control" name="agama" placeholder="Agama" required>
        </div>
        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required>
        </div>
        <div class="form-group">
          <label>Kewarganegaraan</label>
          <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <button type="submit" name="submit" value="create" class="btn btn-success"><i class="fas fa-plus"></i> Create</button>
          </div>
          <div class="col text-right">
            <a href="index.php?page=masyarakat_list" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</section>