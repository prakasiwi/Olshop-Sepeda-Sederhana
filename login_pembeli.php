<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
    function Add(){
        document.getElementById('action').value="insert";
        document.getElementById("id_pembeli").value="";
        document.getElementById("nama").value="";
        document.getElementById("kontak").value="";
        document.getElementById("alamat").value="";
    }
    </script>
</head>
<body>
<ul>
        <li>P</li>
        <li>O</li>
        <li>H</li>
        <li>S</li>
        <li> </li>
        <li>Y</li>
        <li>M</li>
    </ul>
    <div class="container my-5" id="bg">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-6 card">
            <div class="card-header text-center">
            <h3>Login</h3>
            </div>
            <div class="card-body">
            <?php if (isset($_SESSION["message"])): ?>
    <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
        <?php echo $_SESSION["message"]["message"]; ?>
        <?php unset ($_SESSION["message"]); ?>
    </div>
        <?php endif; ?>
            <form action="proses_login_pembeli.php" method="post">
            <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" class="btn btn-success btn-block">
                LOGIN
            </button>
            </form>
            <br>
            <h6>Anda belum mempunyai akun?</h6>
            <button type="button" class="btn btn-outline-primary"
                data-toggle="modal" data-target="#modal" onclick="Add()">
            Sign up!
        </button>
        <i class="fa fa-user btn btn-primary"></i>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="db_akun.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4>Buat Akun</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" id="action">
                        <!-- ID Pembeli
                        <input type="text" name="id_pembeli" id="id_pembeli" class="form-control"> -->
                        Nama
                        <input type="text" name="nama" id="nama" class="form-control">
                        Username
                        <input type="text" name="username" id="username" class="form-control">
                        Password
                        <input type="password" name="password" id="password" class="form-control">
                        Kontak
                        <input type="text" name="kontak" id="kontak" class="form-control">
                        Alamat
                        <input type="text" name="alamat" id="alamat" class="form-control">
                        Gambar
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>