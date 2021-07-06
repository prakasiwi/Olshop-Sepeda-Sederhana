<?php session_start(); ?>
<?php if (isset($_SESSION["session_pembeli"])): ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-light sticky-top px-4">
        <div class="container">
    <h2><i class="fa fa-shopping-cart text-primary"></i></h2>
       <h3 class="text-warning mx-3">MY SHOP</h3>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <span class="navbar navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
            <li class="nav-item"><a href="template_pembeli.php?page=list_sepeda" class="nav-link text-white">BERANDA</a></li>
                <li class="nav-item"><a href="template.php?page=pembeli" class="nav-link"></a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle btn btn-dark mx-2 text-white" id="menu" data-toggle="dropdown"> MENU</a>
                    <div class="dropdown-menu">
                        <a href="template_pembeli.php?page=list_sepeda" class="dropdown-item">List Sepeda</a>
                        <a href="#" class="dropdown-item">Instagram</a>
                        <a href="#" class="dropdown-item">Twitter</a>
                    </div>
                </li>
                <li class="nav-item"><a href="proses_login_pembeli.php?logout=true" class="nav-link text-white btn btn-secondary fa fa-home" onclick="return confirm('Apakah anda yakin ingin keluar sekarang?')"> Logout</a></li>
            </ul>
        </div>
        <h5 class="text-white fa fa-heart mx-3"> Hello, <?php echo $_SESSION["session_pembeli"]["nama"]; ?></h5>
        <a href="template_pembeli.php?page=list_transaksi">
        <b class="text-white btn btn-warning">Beli: <?php echo count($_SESSION["session_transaksi"]); ?></b>
        </a>
        </div>
    </nav>
    <div class="container my-2">
        <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php")===true): ?>
        <?php include $_GET["page"].".php";?>
        <?php endif; ?>
        <?php endif; ?>
</body>

</html>
<?php else: ?>
<?php echo "Anda belum Login!"; ?>
<br>
<a href="login_pembeli.php">Ini tempat Login</a>
<?php endif; ?>