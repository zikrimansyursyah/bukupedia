<?php
include './services/database/database.php';
session_start();
$db = new database();
$btn_login;
$user_toggle;

if (isset($_SESSION['sesi'])) {
  $btn_login = 'd-none';
  $user_toggle = 'd-flex';
} else {
  $btn_login = 'd-flex';
  $user_toggle = 'd-none';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/icon/book.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Bukupedia | Home</title>
</head>

<body>
  <nav class="fixed-top d-flex align-items-center justify-content-between px-5">
    <a href="./" class="logo fs-4 d-inline-flex gap-3">Bukupedia. <span class="logo-title d-inline-flex">Designed
        by <br> Zikri Mansyursyah</span> </a>
    <div class="menu fs-5 fw-light d-flex gap-3">
      <a href="./" class="menu-list px-3 py-1 active">Home</a>
      <a href="./buku/" class="menu-list px-3 py-1">Book</a>
      <a href="./member/" class="menu-list px-3 py-1">Member</a>
      <a href="./transaksi/" class="menu-list px-3 py-1">Transaction</a>
    </div>
    <div class="<?php echo $btn_login ?> gap-2">
      <button id="btn-login" class="btn btn-login px-5" data-bs-toggle="modal" data-bs-target="#login">Login</button>
      <button id="btn-login" class="btn btn-secondary px-4" data-bs-toggle="modal" data-bs-target="#register">Register</button>
    </div>
    <div class='<?php echo $user_toggle; ?>'>
      <div class='user-info px-4 py-2'>Hai! <?php echo $_SESSION['sesi']; ?> </div>
      <button class='user-logo btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-person-fill'></i></button>
      <ul class='dropdown-menu dropdown-menu-end'>
        <li><a class='dropdown-item' href='#'>Settings</a></li>
        <li>
          <hr class='dropdown-divider'>
        </li>
        <li><a class='dropdown-item' href='./services/auth/logout.php'>Logout</a></li>
      </ul>
    </div>
  </nav>

  <video class="bg-video" autoplay muted loop>
    <source src="./assets/videos/bg.mp4" type="video/mp4">
  </video>

  <main class="container-xl main-hero">
    <h1>an Awesome Library by Zikri Mansyursyah</h1>
  </main>

  <footer>
    <div class="container-xl py-4">
      <div class="footer-body d-flex align-items-center gap-5 text-white">
        <div class="ft-content">
          <h3 class="logo"><a href="./">Bukupedia.</a></h3>
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
  <div class="modal" id="login" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 py-4 text-center">
          <h3 class="">Welcome Back!</h3>
          <p class="fw-light mb-4">buku adalah jendela dunia</p>
          <form method="POST" action="./services/auth/login.php">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="user" name="user">
              <label for="user">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password">
              <label for="password">Password</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="register" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 py-4 text-center">
          <h3 class="">Mari Bergabung!</h3>
          <p class="fw-light mb-4">buku adalah jendela dunia</p>
          <form method="POST" action="./services/auth/register.php">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nama" name="nama" required>
              <label for="nama">Nama</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="alamat" name="alamat" required minlength="8">
              <label for="alamat">Alamat</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password" required minlength="6">
              <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="role" name="role" aria-label="Default select example">
                <option value="pengunjung" selected>Pengunjung</option>
                <option value="petugas">Petugas</option>
              </select>
              <label for="role">Daftar Sebagai</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>