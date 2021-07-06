<?php 
    session_start();
    if(isset($_GET["logout"])) {
        session_destroy();
        header("location:login_pembeli.php");
    }
    $username=$_POST["username"];
    $password=md5($_POST["password"]);
    $koneksi=mysqli_connect("localhost","root","","olshop");
    $sql="select*from pembeli where username='$username' and password='$password'";
    $result=mysqli_query($koneksi,$sql);
    $jumlah=mysqli_num_rows($result);

    if ($jumlah==0) {
        $_SESSION["message"]=array(
            "type" => "danger",
            "message" => "Username atau Password salah!"
        );
        header("location:login_pembeli.php");
    } else {
        $_SESSION["session_pembeli"]=mysqli_fetch_array($result);
        $_SESSION["session_transaksi"]=array();
        header("location:template_pembeli.php?page=list_sepeda");
    }
    
?>