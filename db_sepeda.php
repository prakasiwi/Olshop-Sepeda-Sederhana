<?php 
session_start();
$koneksi = mysqli_connect("localhost","root","","olshop");
if (isset($_POST["action"])){
    $kode_sepeda=$_POST["kode_sepeda"];
    $merk_sepeda=$_POST["merk_sepeda"];
    $deskripsi=$_POST["deskripsi"];
    $harga=$_POST["harga"];
    $stok=$_POST["stok"];
    $action=$_POST["action"];

    if ($_POST["action"] == "insert"){
        $path=pathinfo($_FILES["gambar"]["name"]);
        $extensi=$path["extension"];
        $filename=$kode_sepeda."-".rand(1,1000).".".$extensi;
        $sql="insert into sepeda values('$kode_sepeda','$merk_sepeda','$deskripsi','$harga','$stok','$filename')";
        if(mysqli_query($koneksi,$sql)) {
            move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_sepeda/$filename");
            $_SESSION["message"] = array(
                "type" => "success",
                "message" => "Insert data has been succces"
            );
        }else{
            $_SESSION["message"] = array(
                "type" => "danger",
                "message" => mysqli_error($koneksi)
            );
        }
        header("location:template.php?page=sepeda");
    }else if($_POST["action"] == "update") {
        if(!empty($_FILES["gambar"]["name"])) {
            $sql="select*from sepeda where kode_sepeda='$kode_sepeda'";
            $result=mysqli_query($koneksi,$sql);
            $hasil=mysqli_fetch_array($result);

            if (file_exists("img_sepeda/".$hasil["gambar"])) {
                unlink("img_sepeda/".$hasil["gambar"]);
            }
            $path=pathinfo($_FILES["gambar"]["name"]);
            $extensi=$path["extension"];
            $filename=$kode_sepeda."-".rand(1,1000).".".$extensi;
            $sql="update sepeda set merk_sepeda='$merk_sepeda',deskripsi='$deskripsi',harga='$harga',stok='$stok',gambar='$filename' where kode_sepeda='$kode_sepeda'";

            if(mysqli_query($koneksi,$sql)){
                move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_sepeda/$filename");
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
            $sql="update sepeda set merk_sepeda='$merk_sepeda',deskripsi='$deskripsi',harga='$harga',stok='$stok' where kode_sepeda='$kode_sepeda'";
            if(mysqli_query($koneksi,$sql)){
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
        header("location:template.php?page=sepeda");
    }
}

if (isset($_GET["hapus"])){
    $kode_sepeda=$_GET["kode_sepeda"];
    $sql="select*from sepeda where kode_sepeda='$kode_sepeda'";
    $result=mysqli_query($koneksi,$sql);
    $hasil=mysqli_fetch_array($result);
    if (file_exists("img_sepeda/".$hasil["gambar"])) {
        unlink("img_sepeda/".$hasil["gambar"]);
    }
    $sql="delete from sepeda where kode_sepeda='$kode_sepeda'";
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
    header("location:template.php?page=sepeda");
}
?>