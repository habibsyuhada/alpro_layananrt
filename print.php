<?php
  require_once 'database.php';
  $id_surat_pengantar = $_GET['id'];

  $surat_pengantar = mysqli_query($mysqli, "SELECT * FROM surat_pengantar WHERE id = $id_surat_pengantar");
  $surat_pengantar = mysqli_fetch_array($surat_pengantar);

  $nik = $surat_pengantar['nik'];
  $masyarakat = mysqli_query($mysqli, "SELECT * FROM masyarakat WHERE nik = '$nik'");
  $masyarakat = mysqli_fetch_array($masyarakat);

  $id_user = $surat_pengantar['approve_by'];
  $user = mysqli_query($mysqli, "SELECT * FROM user WHERE id = $id_user");
  $user = mysqli_fetch_array($user);

  $nik_rt = $user['nik'];
  $rt = mysqli_query($mysqli, "SELECT * FROM masyarakat WHERE nik = '$nik_rt'");
  $rt = mysqli_fetch_array($rt);
?>
<div style="font-weight: bold; text-align: center;">
  <label for="">PEMERINTAH KABUPATEN/KOTA BATAM</label><br>
  <label for="">KECAMATAN NONGSA</label><br>
  <label for="">KELURAHAN KABIL</label><br>
  <label for="">RT/RW 001/008</label><br>
  <hr>
  <label for="">SURAT KETERANGAN </label><br>
  <label for="">NO: S-<?= str_pad($surat_pengantar['id'], 4, '0', STR_PAD_LEFT); ?></label><br>
</div>
<div style="margin-top: 10px;">
  <table>
    <tr>
      <td colspan="3">Yang Bertanda tangan dibawah ini Ketua RT 001 RW 008 Desa/Kel. Kabil Kecamatan. Nongsa Kab/Kota Batam Dengan ini menerangkan bahwa:</td>
    </tr>
    <tr>
      <td width="15%">Nama</td>
      <td width="1%">:</td>
      <td><?= ucwords($masyarakat['nama']) ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?= ucwords($masyarakat['alamat']) ?></td>
    </tr>
    <tr>
      <td>No KTP</td>
      <td>:</td>
      <td><?= ucwords($masyarakat['nik']) ?></td>
    </tr>
    <tr>
      <td colspan="3">adalah benar warga yang berdomisili di tempat kami.</td>

    </tr>
    <tr>
      <td colspan="3"><br>Demikian surat ini kami buat <?= $surat_pengantar['alasan'] ?> dan atas perhatiannya kami ucapkan terima kasih </td>
    </tr>
  </table>
  <br>
  <table width="100%">
    <tr>
      <td width="50%">Mengetahui</td>
      <td width="50%"></td>

    </tr>
    <tr>
      <td>Ketua RT<br><br><br><br></td>
    </tr>

    <tr>
      <td><?= $rt['nama'] ?></td>
    </tr>
  </table>
</div>