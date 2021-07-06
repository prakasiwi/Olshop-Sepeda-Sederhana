<?php session_start(); ?>
<?php if (isset($_SESSION["session_admin"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-primary navbar-light sticky-top px-4">
        <img src="ig.png" alt="" width="50" height="auto" class="mx-4">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="template.php?page=pembeli" class="nav-link text-dark">Pembeli</a></li>
                <li class="nav-item"><a href="template.php?page=admin" class="nav-link text-dark">Admin</a></li>
                <li class="nav-item"><a href="template.php?page=sepeda" class="nav-link text-dark">Sepeda</a></li>
                <li class="nav-item"><a href="template.php?page=daftar_pembelian" class="nav-link text-dark">Daftar Pembelian</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-dark" id="kontak" data-toggle="dropdown">Kontak</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Facebook</a>
                        <a href="#" class="dropdown-item">Instagram</a>
                        <a href="#" class="dropdown-item">Twitter</a>
                    </div>
                </li>
                <li class="nav-item"><a href="proses_login.php?logout=true" class="nav-link text-white btn btn-dark fa fa-home" onclick="return confirm('Apakah anda yakin ingin keluar sekarang?')"> Logout</a></li>
            </ul>
            </div>
            <h5 class="text-white fa fa-heart"> Hello, <?php echo $_SESSION["session_admin"]["nama"]; ?></h5>
    </nav>
    <div class="container my-2">
        <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php")===true): ?>
        <?php include $_GET["page"].".php";?>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>
<?php else: ?>
<?php echo "Anda belum Login!"; ?>
<br>
<a href="login.php">Ini tempat Login</a>
<?php endif; ?>