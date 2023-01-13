<section class="content mt-3">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Masyarakat</h3>
    </div>
    <div class="card-body">
      <a href="index.php?page=masyarakat_new" class="btn btn-success"><i class="fas fa-plus"></i> Create New Masyarakat</a>
      <?php
        $result = mysqli_query($mysqli, "SELECT * FROM masyarakat");
      ?>
      <table class="table table-bordered table-hover text-center datatables">
        <thead>
          <tr class="bg-success">
            <th>NIK</th>
            <th>No KK</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Kewarganegaraan</th>
            <th>Alamat</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php while($masyarakat = mysqli_fetch_array($result)): ?>
          <tr>
            <td><?= $masyarakat['nik'] ?></td>
            <td><?= $masyarakat['no_kk'] ?></td>
            <td><?= $masyarakat['nama'] ?></td>
            <td><?= $masyarakat['tempat_lahir'] ?></td>
            <td><?= $masyarakat['tanggal_lahir'] ?></td>
            <td><?= $masyarakat['jenis_kelamin'] ?></td>
            <td><?= $masyarakat['status_perkawinan'] ?></td>
            <td><?= $masyarakat['agama'] ?></td>
            <td><?= $masyarakat['pekerjaan'] ?></td>
            <td><?= $masyarakat['kewarganegaraan'] ?></td>
            <td><?= $masyarakat['alamat'] ?></td>
            <td>
              <a href="index.php?page=masyarakat_edit&id=<?= $masyarakat['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>
<script>
  $(function () {
    $('.datatables').DataTable({
      "lengthChange": false,
      "order": [],
    });
  });
</script>