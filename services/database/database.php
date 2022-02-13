<?php
class database
{
  var $host = "localhost";
  var $username = "root";
  var $pass = "";
  var $db = "e_library";

  function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->pass, $this->db);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    } else {
      echo "Connected successfully";
    }
  }

  function tampil_buku()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM tb_buku");
    if (mysqli_num_rows($data) > 0) {
      while ($d = mysqli_fetch_array($data)) {
        $hasil[] = $d;
      }
      return $hasil;
    }
  }

  function tampil_user()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM tb_user");
    if (mysqli_num_rows($data) > 0) {
      while ($d = mysqli_fetch_array($data)) {
        $hasil[] = $d;
      }
      return $hasil;
    }
  }

  function tampil_transaksi()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM transaksi");
    if (mysqli_num_rows($data) > 0) {
      while ($d = mysqli_fetch_array($data)) {
        $hasil[] = $d;
      }
      return $hasil;
    }
  }

  function tambah_buku($judul, $kategori, $pengarang, $penerbit)
  {
    mysqli_query($this->conn, "INSERT INTO `e_library`.`tb_buku` (`judul_buku`, `kategori`, `pengarang`, `penerbit`) VALUES ('$judul', '$kategori', '$pengarang', '$penerbit')");
  }

  function edit_buku($id, $judul, $kategori, $pengarang, $penerbit)
  {
    mysqli_query($this->conn, "UPDATE `e_library`.`tb_buku` SET `judul_buku`='$judul', `kategori`='$kategori', `pengarang`='$pengarang', `penerbit`='$penerbit' WHERE  `id_buku`=$id;");
  }

  function hapus_buku($id)
  {
    mysqli_query($this->conn, "DELETE FROM `e_library`.`tb_buku` WHERE  `id_buku`=$id");
  }

  function edit_member($id, $nama, $alamat, $role)
  {
    mysqli_query($this->conn, "UPDATE `e_library`.`tb_user` SET `nama`='$nama', `alamat`='$alamat', `user_role`='$role' WHERE  `id_user`=$id;");
  }

  function hapus_member($id)
  {
    mysqli_query($this->conn, "DELETE FROM `e_library`.`tb_user` WHERE  `id_user`=$id;");
  }

  function tambah_transaksi($id_anggota, $id_buku, $tgl_pinjam, $tgl_pengembalian)
  {
    mysqli_query($this->conn, "INSERT INTO `e_library`.`transaksi` (`id_anggota`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_pengembalian');");
  }

  function edit_transaksi($id_transaksi, $id_anggota, $id_buku, $tgl_pinjam, $tgl_pengembalian)
  {
    mysqli_query($this->conn, "UPDATE `e_library`.`transaksi` SET `id_anggota`='$id_anggota', `id_buku`='$id_buku', `tgl_peminjaman`='$tgl_pinjam', `tgl_pengembalian`='$tgl_pengembalian' WHERE  `id_transaksi`=$id_transaksi;");
  }

  function hapus_transaksi($id)
  {
    mysqli_query($this->conn, "DELETE FROM `e_library`.`transaksi` WHERE  `id_transaksi`=$id;");
  }
}
