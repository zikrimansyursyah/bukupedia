<?php
session_start();
$_SESSION['sesi'] = null;

include '../database/database.php';
$db = new database();

if (isset($_POST['submit'])) {
  $user  = isset($_POST['user']) ? $_POST['user'] : "";
  $pass  = isset($_POST['password']) ? $_POST['password'] : "";
  $query  = mysqli_query($db->conn, "SELECT * FROM tb_user WHERE nama = '$user' AND password = '$pass'");
  $sesi  = mysqli_num_rows($query);

  if ($sesi >= 1) {
    $data_query = mysqli_fetch_array($query);
    $_SESSION['id_user'] = $data_query['id_user'];
    $_SESSION['sesi'] = $data_query['nama'];
    echo "<meta http-equiv='refresh' content='0; url=../../'>";
  } else {
    echo "<meta http-equiv='refresh' content='0; url=../../'>";
    echo "<script>alert('Login Gagal: Username atau Password Salah')</script>";
  }
} else {
  header('location:../../');
}
