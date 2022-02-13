<?php
include '../database/database.php';
$db = new database();

if (isset($_POST['submit'])) {
  $nama  = isset($_POST['nama']) ? $_POST['nama'] : "";
  $alamat  = isset($_POST['alamat']) ? $_POST['alamat'] : "";
  $password  = isset($_POST['password']) ? $_POST['password'] : "";
  $role  = isset($_POST['role']) ? $_POST['role'] : "";
  $query  = mysqli_query($db->conn, "INSERT INTO `e_library`.`tb_user` (`nama`, `alamat`, `password`, `user_role`) VALUES ('$nama', '$alamat', '$password', '$role');");

  echo "<script>alert('Registrasi Berhasil, silahkan Login')</script>";
  echo "<meta http-equiv='refresh' content='0; url=../../'>";
} else {
  header('location:../../');
}
