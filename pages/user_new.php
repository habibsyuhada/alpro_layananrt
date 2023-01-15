<?php
  $post = $_POST;
  
  if($post['submit']){
    $username = $post['username'];
    $password = md5($post['password']);
    $name = $post['name'];
    $nik = $post['nik'];
    $level = $post['level'];

    $result = mysqli_query($mysqli, "SELECT * FROM masyarakat WHERE nik = '$nik'");
    if(mysqli_num_rows($result) == 0){
      $toastr_error = 'Error: Nik Not Found!';
    }

    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE nik = '$nik'");
    if(mysqli_num_rows($result) > 0){
      $toastr_error = 'Error: NIK Already Used by Others!';
    }

    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$nik'");
    if(mysqli_num_rows($result) > 0){
      $toastr_error = 'Error: Username Already Used by Others!';
    }

    if(!@$toastr_error){
      $result = mysqli_query($mysqli, "INSERT INTO user(username,password,name,nik,level) VALUES('$username','$password','$name','$nik','$level')");
  
      $toastr_success = 'Success: User Has Been Created!';
    }

  }
?>
<section class="content  mt-3">

  <form method="post" action="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create New User</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
          <label>NIK</label>
          <input type="text" class="form-control" name="nik" placeholder="Enter NIK" required>
        </div>
        <div class="form-group">
          <label>Level</label>
          <select class="form-control" name="level" required>
            <option>---</option>
            <option value="RT">RT</option>
            <option value="WARGA">WARGA</option>
          </select>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <button type="submit" name="submit" value="create" class="btn btn-success"><i class="fas fa-plus"></i> Create</button>
          </div>
          <div class="col text-right">
            <a href="index.php?page=user_list" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</section>