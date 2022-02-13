<?php
include './database/database.php';
$db = new database();

if (isset($_POST['submit'])) {
  $action = $_GET['to'];
  if ($action === "book") {
    $db->hapus_buku($_POST['id_buku']);
    header('location:../buku');
  } else if ($action === "member") {
    $db->hapus_member($_POST['id_user']);
    header('location:../member');
  } else if ($action === "transaction") {
    $db->hapus_transaksi($_POST['id_transaksi']);
    header('location:../transaksi');
  }
} else {
  header('location:../');
}
