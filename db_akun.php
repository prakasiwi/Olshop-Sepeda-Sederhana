<?php 
session_start();
$koneksi = mysqli_connect("localhost","root","","olshop");
    if (isset($_POST["action"])) {
        $id_pembeli = $_POST["id_pembeli"];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $kontak = $_POST["kontak"];
        $alamat = $_POST["alamat"];
        $action = $_POST["action"];

        if($_POST["action"] == "insert"){
            $path=pathinfo($_FILES["gambar"]["name"]);
            $extensi=$path["extension"];
            $filename=$id_pembeli."-".rand(1,1000).".".$extensi;
            $id_pembeli = rand(10000,1000000);
            $sql="insert into pembeli values('$id_pembeli','$nama','$username','$password','$kontak','$alamat','$filename')";
            if(mysqli_query($koneksi,$sql)){
                move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_pembeli/$filename");
                $_SESSION["message"] = array(
                    "type" => "success",
                    "message" => "Account created successfully"
                );
            }else{
                $_SESSION["message"] = array(
                    "type" => "danger",
                    "message" => mysqli_error($koneksi)
                );
            }
            header("location:login_pembeli.php");
        }}
?>