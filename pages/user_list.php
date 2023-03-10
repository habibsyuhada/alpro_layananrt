<section class="content mt-3">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">User List</h3>
    </div>
    <div class="card-body">
      <a href="index.php?page=user_new" class="btn btn-success"><i class="fas fa-plus"></i> Create New User</a>
      <?php
        $result = mysqli_query($mysqli, "SELECT * FROM user");
      ?>
      <table class="table table-bordered table-hover text-center datatables">
        <thead>
          <tr class="bg-success">
            <th>Username</th>
            <th>Name</th>
            <th>NIK</th>
            <th>Level</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php while($user = mysqli_fetch_array($result)): ?>
          <tr>
            <td><?= $user['username'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['nik'] ?></td>
            <td><?= $user['level'] ?></td>
            <td>
              <a href="index.php?page=user_edit&id=<?= $user['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
              <a href="index.php?page=user_delete&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete This?')"><i class="fas fa-trash"></i> Delete</a>
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