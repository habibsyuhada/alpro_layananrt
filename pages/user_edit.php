<?php
  $post = $_POST;
  $id_user = $_GET['id'];
  
  if($post['submit']){
    $username = $post['username'];
    $level = $post['level'];

    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$nik' and id != $id_user");
    if(mysqli_num_rows($result) > 0){
      $toastr_error = 'Error: Username Already Used by Others!';
    }

    if(!@$toastr_error){
      $result = mysqli_query($mysqli, "UPDATE user SET username='$username', level='$level' WHERE id=$id_user");
  
      $toastr_success = 'Success: User Has Been Created!';
    }

  }

  $user = mysqli_query($mysqli, "SELECT * FROM user WHERE id = '$id_user'");
  $user = mysqli_fetch_array($user);
?>
<section class="content  mt-3">

  <form method="post" action="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User : <?= $user['name'] ?></h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" value="<?= $user['password'] ?>" placeholder="Enter Password" required readonly>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" placeholder="Enter Name" required readonly>
        </div>
        <div class="form-group">
          <label>NIK</label>
          <input type="text" class="form-control" name="nik" value="<?= $user['nik'] ?>" placeholder="Enter NIK" required readonly>
        </div>
        <div class="form-group">
          <label>Level</label>
          <select class="form-control" name="level" required>
            <option>---</option>
            <option value="RT" <?= ($user['level'] == 'RT' ? 'selected' : '') ?>>RT</option>
            <option value="WARGA" <?= ($user['level'] == 'WARGA' ? 'selected' : '') ?>>WARGA</option>
          </select>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <button type="submit" name="submit" value="edit" class="btn btn-warning"><i class="fas fa-edit"></i> Update</button>
          </div>
          <div class="col text-right">
            <a href="index.php?page=user_list" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</section>