<?php 
session_start();
$koneksi = mysqli_connect("localhost","root","","olshop");
    if (isset($_POST["action"])) {
        $id_pembeli = $_POST["id_pembeli"];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $kontak = $_POST["kontak"];
        $alamat = $_POST["alamat"];
        $action = $_POST["action"];

        if($_POST["action"] == "insert"){
            $path=pathinfo($_FILES["gambar"]["name"]);
            $extensi=$path["extension"];
            $filename=$id_pembeli."-".rand(1,1000).".".$extensi;
            $sql="insert into pembeli values('$id_pembeli','$nama','$username','$password','$kontak','$alamat','$filename')";
            if(mysqli_query($koneksi,$sql)){
                move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_pembeli/$filename");
                $_SESSION["message"] = array(
                    "type" => "success",
                    "message" => "Insert data has been success"
                );
            }else{
                $_SESSION["message"] = array(
                    "type" => "danger",
                    "message" => mysqli_error($koneksi)
                );
            }
            header("location:template.php?page=pembeli");
        }else if($_POST["action"] == "update") {
            if(!empty($_FILES["gambar"]["name"])) {
                $sql="select*from pembeli where id_pembeli='$id_pembeli'";
            $result=mysqli_query($koneksi,$sql);
            $hasil=mysqli_fetch_array($result);

            if (file_exists("img_pembeli/".$hasil["gambar"])){
                unlink("img_pembeli/".$hasil["gambar"]);
            }
            $path=pathinfo($_FILES["gambar"]["name"]);
            $extensi=$path["extension"];
            $filename=$id_pembeli."-".rand(1,1000).".".$extensi;
            $sql="update pembeli set id_pembeli='$id_pembeli',nama='$nama',username='$username',password='$password',kontak='$kontak',alamat='$alamat',gambar='$filename' where id_pembeli='$id_pembeli'";

            if(mysqli_query($koneksi,$sql)) {
                move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_pembeli/$filename");
                $_SESSION["message"] = array(
                    "type" => "success",
                    "message" => "Update data has been success"
                );
            }else{
                $_SESSION["message"] = array(
                    "type" => "danger",
                    "message" => mysqli_error($koneksi)
                );
            }
            }else{
                $sql="update pembeli set id_pembeli='$id_pembeli',nama='$nama',username='$username',password='$password',kontak='$kontak',alamat='$alamat' where id_pembeli='$id_pembeli'";
                if(mysqli_query($koneksi,$sql)) {
                    $_SESSION["message"] = array(
                        "type" => "success",
                        "message" => "Update data has been success"
                    );
                }else{
                    $_SESSION["message"] = array(
                        "type" => "danger",
                        "message" => mysqli_error($koneksi)
                    );
                }
            }
            header("location:template.php?page=pembeli");
        }
    }

    if (isset($_GET["hapus"])){
        $id_pembeli=$_GET["id_pembeli"];
        $sql="select*from pembeli where id_pembeli='$id_pembeli'";
    $result=mysqli_query($koneksi,$sql);
    $hasil=mysqli_fetch_array($result);
        if (file_exists("img_pembeli/".$hasil["gambar"])) {
            unlink("img_pembeli/".$hasil["gambar"]);
        }
        $sql="delete from pembeli where id_pembeli='$id_pembeli'";
        if(mysqli_query($koneksi,$sql)){
            $_SESSION["message"] = array(
                "type" => "success",
                "message" => "Delete data has been success"
            );
        }else{
            $_SESSION["message"] = array(
                "type" => "danger",
                "message" => mysqli_error($koneksi)
            );
        }
        header("location:template.php?page=pembeli");
    }
?>