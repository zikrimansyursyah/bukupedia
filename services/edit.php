<?php
include './database/database.php';
$db = new database();

if (isset($_POST['submit'])) {
  $action = $_GET['to'];
  if ($action === "book") {
    $db->edit_buku($_POST['id_buku'], $_POST['judul_buku'], $_POST['kategori'], $_POST['pengarang'], $_POST['penerbit']);
    header('location:../buku');
  } else if ($action === "member") {
    $db->edit_member($_POST['id_user'], $_POST['nama'], $_POST['alamat'], $_POST['role']);
    header('location:../member');
  } else if ($action === "transaction") {
    $db->edit_transaksi($_POST['id_transaksi'], $_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_meminjam'], $_POST['tanggal_mengembalikan']);
    header('location:../transaksi');
  }
} else {
  header('location:../');
}
