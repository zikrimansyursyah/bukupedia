<?php
include '../services/database/database.php';
session_start();
$db = new database();

if (!isset($_SESSION['sesi'])) {
  header("location:../403");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/icon/book.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Bukupedia | Buku</title>
</head>

<body>
  <nav class="fixed-top d-flex align-items-center justify-content-between px-5">
    <a href=".././" class="logo fs-4 d-inline-flex gap-3">Bukupedia. <span class="logo-title d-inline-flex">Designed
        by <br> Zikri Mansyursyah</span> </a>
    <div class="menu fs-5 fw-light d-flex gap-3">
      <a href=".././" class="menu-list px-3 py-1">Home</a>
      <a href="./" class="menu-list px-3 py-1 active">Book</a>
      <a href="../member/" class="menu-list px-3 py-1">Member</a>
      <a href="../transaksi" class="menu-list px-3 py-1">Transaction</a>
    </div>
    <div class='d-flex'>
      <div class='user-info px-4 py-2'>Hai! <?php echo $_SESSION['sesi']; ?> </div>
      <button class='user-logo btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-person-fill'></i></button>
      <ul class='dropdown-menu dropdown-menu-end'>
        <li><a class='dropdown-item' href='#'>Settings</a></li>
        <li>
          <hr class='dropdown-divider'>
        </li>
        <li><a class='dropdown-item' href='../services/auth/logout.php'>Logout</a></li>
      </ul>
    </div>
  </nav>

  <main class="container-xl">
    <div class="table-content card h-auto">
      <div class="table-head px-4 pt-3 pb-1 border-bottom">
        <h1>Book List</h1>
      </div>
      <div class="table-data p-4">
        <button class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Buku</button>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Id Buku</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Kategori</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Penerbit</th>
              <th scope="col" style="width: 10rem;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            if (!empty($db->tampil_buku())) {
              foreach ($db->tampil_buku() as $d) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['id_buku']; ?></td>
                  <td><?php echo $d['judul_buku']; ?></td>
                  <td><?php echo $d['kategori']; ?></td>
                  <td><?php echo $d['pengarang']; ?></td>
                  <td><?php echo $d['penerbit']; ?></td>
                  <td class="data-opsi">
                    <button class="btn btn-login" data-bs-toggle="modal" data-bs-target="#edit" onclick="setEdit('<?php echo $d['id_buku']; ?>','<?php echo $d['judul_buku']; ?>','<?php echo $d['kategori']; ?>','<?php echo $d['pengarang']; ?>','<?php echo $d['penerbit']; ?>')">Edit</button>
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#hapus" onclick="setDelete('<?php echo $d['id_buku']; ?>','<?php echo $d['judul_buku']; ?>')">Hapus</button>
                  </td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <footer>
    <div class="container-xl py-4">
      <div class="footer-body d-flex align-items-center gap-5 text-white">
        <div class="ft-content">
          <h3 class="logo"><a href="../">Bukupedia.</a></h3>
          <div class="ft-desc">Bukupedia merupakan aplikasi untuk mereka yang senang membaca buku atau hanya
            sekedar mencari refrensi, disini anda dapat membaca bahkan melakukan peminjaman buku secara
            online. ayo baca buku, buku adalah jendela dunia</div>
          <div class="media-sosial">
            <a href="https://github.com/zikrimansyursyah" target="_blank" title="My Github"><i class="bi bi-github"></i></a>
            <a href="https://www.linkedin.com/in/zikrimansyursyah/" target="_blank" title="My LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="https://zikrimansyursyah.com" target="_blank" title="My Portfolio"><i class="bi bi-globe"></i></a>
            <a href="https://www.facebook.com/zikrimansyursyah" target="_blank" title="My Facebook"><i class="bi bi-facebook"></i></a>
          </div>
        </div>
        <div class="ft-content">
          <h2 class="sub-footer">Popular</h2>
          <a href="#" class="ft-desc link">Satanic for Kids 3rd Edition</a>
          <a href="#" class="ft-desc link">Heavy React Js Programming Lesson</a>
          <a href="#" class="ft-desc link">Tell Me No Lies</a>
          <a href="#" class="ft-desc link">Dunia Lain Gunung Rinjani</a>
        </div>
      </div>
    </div>
    <div class="footnote">
      <div class="container-xl h-100 d-flex align-items-center justify-content-between">
        <div>All Rights Reserved &copy; Crafty by Zikri </div>
        <div>Design and Created with &nbsp;<i class="bi bi-heart-fill" style="font-size: 12px;"></i>&nbsp; and
          Passion -
          Zikri Mansyursyah - 2021</div>
      </div>
    </div>
  </footer>

  <!-- modal -->
  <div class="modal" id="tambah" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 py-4">
          <form method="POST" action="../services/create.php?to=book">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="judul_buku" name="judul_buku" required minlength="5">
              <label for="judul_buku">Judul Buku</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="kategori" name="kategori">
                <option value="Kids" selected>Kids</option>
                <option value="Novel">Novel</option>
                <option value="Cerpen">Cerpen</option>
              </select>
              <label for="kategori">Kategori</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="pengarang" name="pengarang" required minlength="5">
              <label for="pengarang">Pengarang</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="penerbit" name="penerbit" required minlength="5">
              <label for="penerbit">Penerbit</label>
            </div>
            <button type="submit" class="btn btn-primary float-end" name="submit">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal edit -->
  <div class="modal" id="edit" tabindex="-1">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 py-4">
          <form method="POST" action="../services/edit.php?to=book">
            <input type="text" id="edit_id_buku" name="id_buku" style="display: none;" readonly>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_judul_buku" name="judul_buku" required minlength="5">
              <label for="edit_judul_buku">Judul Buku</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="edit_kategori" name="kategori">
                <option value="Kids">Kids</option>
                <option value="Novel">Novel</option>
                <option value="Cerpen">Cerpen</option>
              </select>
              <label for="edit_kategori">Kategori</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_pengarang" name="pengarang" required minlength="5">
              <label for="edit_pengarang">Pengarang</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_penerbit" name="penerbit" required minlength="5">
              <label for="edit_penerbit">Penerbit</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary float-end">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal hapus -->
  <div class="modal" id="hapus" tabindex="-1">
    <div class="action-hapus modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title_hapus"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 py-4 d-flex gap-3 justify-content-center">
          <form action="../services/delete.php?to=book" method="post">
            <input type="text" id="hapus_id_buku" name="id_buku" style="display: none;" readonly>
            <button class="btn btn-secondary" type="submit" name="submit">Hapus</button>
          </form>
          <button class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
    function setEdit(id, judul, kategori, pengarang, penerbit) {
      document.querySelector("#edit_id_buku").value = id;
      document.querySelector("#edit_judul_buku").value = judul;
      document.querySelector("#edit_kategori").value = kategori;
      document.querySelector("#edit_pengarang").value = pengarang;
      document.querySelector("#edit_penerbit").value = penerbit;
    }

    function setDelete(id, judul) {
      document.querySelector("#title_hapus").innerHTML = `Hapus Buku ${judul} ?`;
      document.querySelector("#hapus_id_buku").value = id;
    }
  </script>
</body>

</html>