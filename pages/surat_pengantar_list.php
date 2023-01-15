<section class="content mt-3">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Surat Pengantar</h3>
    </div>
    <div class="card-body">
      <a href="index.php?page=surat_pengantar_new" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Surat Pengantar</a>
      <?php
        if($_SESSION['level'] == 'RT'){
          $result = mysqli_query($mysqli, "SELECT * FROM surat_pengantar");
        }
        elseif($_SESSION['level'] == 'WARGA'){
          $result = mysqli_query($mysqli, "SELECT * FROM surat_pengantar WHERE created_by = ".$_SESSION['id']);
        }
      ?>
      <table class="table table-bordered table-hover text-center datatables">
        <thead>
          <tr class="bg-success">
            <th>No Surat</th>
            <th>NIK</th>
            <th>Alasan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php while($surat_pengantar = mysqli_fetch_array($result)): ?>
          <tr>
            <td><?= 'S'.str_pad($surat_pengantar['id'], 4, '0', STR_PAD_LEFT); ?></td>
            <td><?= $surat_pengantar['nik'] ?></td>
            <td><?= $surat_pengantar['alasan'] ?></td>
            <td><?= $surat_pengantar['created_date'] ?></td>
            <td><?= $surat_pengantar['status'] ?></td>
            <td>
              <?php if($_SESSION['level'] == 'RT'): ?>
                <a href="index.php?page=surat_pengantar_edit&id=<?= $surat_pengantar['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="index.php?page=surat_pengantar_delete&id=<?= $surat_pengantar['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete This?')"><i class="fas fa-trash"></i> Delete</a>
              <?php endif; ?>
              <?php if($surat_pengantar['status'] == 'Disetujui'): ?>
                <a target="_blank" href="print.php?id=<?= $surat_pengantar['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print</a>
              <?php elseif($surat_pengantar['status'] == 'Permintaan'): ?>
                <a href="index.php?page=surat_pengantar_approve&id=<?= $surat_pengantar['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Are You Sure to Approve This?')"><i class="fas fa-check"></i> Approve</a>
                <a href="index.php?page=surat_pengantar_reject&id=<?= $surat_pengantar['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Reject This?')"><i class="fas fa-times"></i> Reject</a>
              <?php endif; ?>
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