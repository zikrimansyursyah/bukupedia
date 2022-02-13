<?php
include './database/database.php';
$db = new database();

if (isset($_POST['submit'])) {
  $action = $_GET['to'];
  if ($action === "book") {
    $db->tambah_buku($_POST['judul_buku'], $_POST['kategori'], $_POST['pengarang'], $_POST['penerbit']);
    header('location:../buku');
  } else if ($action === "transaction") {
    $db->tambah_transaksi($_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_meminjam'], $_POST['tanggal_mengembalikan']);
    header('location:../transaksi');
  }
} else {
  header('location:../');
}
