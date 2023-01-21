<?php
  require_once 'database.php';

  $result = mysqli_query($mysqli, "TRUNCATE TABLE user");
  $result = mysqli_query($mysqli, "TRUNCATE TABLE masyarakat");
  $result = mysqli_query($mysqli, "TRUNCATE TABLE surat_pengantar");

  function query_builder_insert($table, $form_data){
    $column = [];
    $values = [];
    foreach ($form_data as $key => $value) {
      $column[] = $key;
      if(gettype($value) == 'string'){
        $values[] = "'".$value."'";
      }
      else{
        $values[] = $value;
      }
    }
    $column = join(", ", $column);
    $values = join(", ", $values);
    $query = "INSERT INTO $table($column) VALUES($values);";

    return $query;
  }

  $query_masyarakat = [];

  $male_name = ['Wayne Douglass', 'Bryon Showalter', 'Andre Clinton', 'Matteo Landon', 'Haden Hollis', 'Anthony Hogan', 'Elmer Yoder', 'Elliott Ambrose', 'Drake Jameson', 'Milton Aquino', 'Morris Scully', 'Josue Coffman', 'Nicholas Booth', 'Corbin Beasley', 'Shelby Coffman', 'John Seymour', 'Jayce Mata', 'Darrian Edgar', 'Damon Overstreet', 'Ahmed Bledsoe', 'Dennis Monroe', 'Jovanni Peoples', 'Triston Bull', 'Nikhil Holland', 'Lonnie Jankowski'];
  $female_name  = ['Kianna Lester', 'Caleigh Barlow', 'Samantha Withers', 'Maura Corley', 'Adela Tolliver', 'Addie Chaffin', 'Dayana Rainey', 'Sade Erickson', 'Kaylan Balderas', 'Taylor Alaniz', 'Jacquelyn Still', 'Gabriella Kolb', 'Estefani Lowery', 'Kalynn Winkler', 'Saira Clifton', 'Jailene Burger', 'Haylee Romo', 'Katlynn Reddy', 'Kendall Eckert', 'Yareli Tubbs', 'Cherish Selby', 'Hailee Levesque', 'Leia Rock', 'Gisel Nolan', 'Karah Parish'];
  $people_name = array_merge($male_name, $female_name);

  $nik = 221055201000;
  $no_kk = 332211;
  foreach ($people_name as $no => $name) {
    $nik++;
    if($no%5==0){
      $no_kk++;
    }
    if($no < count($male_name)){
      $jenis_kelamin = 'Pria';
    }
    else{
      $jenis_kelamin = 'Wanita';
    }
    $status_perkawinan = ['Belum Menikah', 'Menikah'];
    $status_perkawinan = $status_perkawinan[rand(0, 1)];

    $form_data = [
      "nik" => (string)$nik,
      "no_kk" => (string)$no_kk,
      "nama" => $name,
      "tempat_lahir" => 'Batam',
      "tanggal_lahir" => date('Y-m-d', rand(strtotime("1990-01-01"), strtotime("2000-12-31"))),
      "jenis_kelamin" => $jenis_kelamin,
      "alamat" => "Perum Purna Yudha Indah Blok N No ".substr($no_kk, -2),
      "status_perkawinan" => $status_perkawinan,
      "agama" => 'Islam',
      "pekerjaan" => 'Karyawan Swasta',
      "kewarganegaraan" => 'WNI',
    ];
    $result = mysqli_query($mysqli, query_builder_insert('masyarakat', $form_data));

    $query_masyarakat[] = $form_data;
  }

  
  //-----------------------------------------------------------------------------
  $no_kk = '';
  $level_list = ["WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "WARGA", "RT"];
  foreach ($query_masyarakat as $key => $value) {
    if($no_kk != $value['no_kk']){
      $no_kk = $value['no_kk'];
      $form_data = [
        "username" => str_replace(" ", "_", strtolower($value['nama'])),
        "password" => md5('123'),
        "name" => $value['nama'],
        "nik" => $value['nik'],
        "level" => array_pop($level_list),
      ];

      $result = mysqli_query($mysqli, query_builder_insert('user', $form_data));
    }
  }

  //-----------------------------------------------------------------------------

  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE level = 'RT'");
  $rt = mysqli_fetch_array($result);

  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE level = 'WARGA'");
  while($user = mysqli_fetch_array($result)) {
    $form_data = [
      "nik" => $value['nik'],
      "alasan" => $value['alasan'],
      "created_by" => $value['alasan'],
      "created_date" => $value['alasan'],
      "keterangan" => $value['alasan'],
      "status" => $value['alasan'],
      "approve_by" => $value['alasan'],
      "approve_date" => $value['alasan'],
    ];
  }
?>