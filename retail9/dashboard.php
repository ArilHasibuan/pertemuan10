<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['login'])) {
    header('location:index.php');
} else {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retail App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  </head>
  <body class="bg-secondary-subtle">
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand" href="#">Retail Application</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item px-2">
          <a class="nav-link active" aria-current="page" href="?modul=home">Home</a>
        </li>
        <li class="nav-item dropdown px-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Barang
          </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?modul=barang">Data Barang</a></li>
            <li><a class="dropdown-item" href="?modul=persediaan">Persediaan Barang</a></li>
            <li><a class="dropdown-item" href="?modul=kategori">Kategori</a></li>
            <li><a class="dropdown-item" href="?modul=pemasok">Pemasok</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?modul=penjualan">Penjualan</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="?modul=pengguna">Pengguna</a>
        </li>
       <!-- button akun -->
        <div class="btn-group">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person"></i>
            <?=$_SESSION['nama_lengkap'];?>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?modul=profile">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
        </div>

      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid py-3 bg-white shadow-sm">
    <div class="container">
        <?php
        if(isset($_GET['modul'])) {
            if($_GET['modul']=="home") {
                include "home.php";
            }elseif($_GET['modul']=="barang") {
              include "modul/barang/index.php";
            }elseif($_GET['modul']=="persediaan") {
                include "modul/persediaan/index.php";
            }elseif($_GET['modul']=="penjualan") {
                include "modul/penjualan/index.php";
            }elseif($_GET['modul']=="pengguna") {
                include "modul/pengguna/index.php";
            }elseif($_GET['modul']=="profile") {
                include "modul/profile/index.php";
            }elseif($_GET['modul']=="kategori") {
              include "modul/kategori/index.php";
            }elseif($_GET['modul']=="pemasok") {
              include "modul/pemasok/index.php";
            }else{
                include "home.php";
            }
        }else{
                include "home.php";
            }
        ?>
    </div>    
</div>
<div class="text-center">
    <span>Copyright &copy; 2024 | Retail Application</span>
</div>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>