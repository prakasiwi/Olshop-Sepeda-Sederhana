<?php 
    session_start();
    if(isset($_GET["logout"])) {
        session_destroy();
        header("location:login.php");
    }
    $username=$_POST["username"];
    $password=md5($_POST["password"]);

    $koneksi=mysqli_connect("localhost","root","","olshop");
    $sql="select*from admin where username='$username' and password='$password'";
    $result=mysqli_query($koneksi,$sql);
    $jumlah=mysqli_num_rows($result);

    if ($jumlah==0) {
        $_SESSION["message"]=array(
            "type"=>"danger",
            "message"=>"Username atau Password salah!"
        );
        header("location:login.php");
    } else {
        $_SESSION["session_admin"]=mysqli_fetch_array($result);
        header("location:template.php");
    }
    
?>