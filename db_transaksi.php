<?php 
session_start();
$koneksi=mysqli_connect("localhost","root","","olshop");
if (isset($_GET["transaksi"])) {
    $kode_sepeda=$_GET["kode_sepeda"];
    $sql="select * from sepeda where kode_sepeda='$kode_sepeda'";
    $result=mysqli_query($koneksi,$sql);
    $hasil=mysqli_fetch_array($result);
    if (!in_array($hasil, $_SESSION["session_transaksi"])) {
        array_push($_SESSION["session_transaksi"],$hasil);
    }
    header("location:template_pembeli.php?page=list_sepeda");
}

if(isset($_GET["checkout"])){
    // $koneksi=mysqli_connect("localhost","root","","olshop");
    $id_transaksi=rand(1,10000).date("dmY");
    $id_pembeli=$_SESSION["session_pembeli"]["id_pembeli"];
    // $id_admin=null;
    $tgl=date("Y-m-d");
    // $tgl_kembali=null;
    $sql="insert into transaksi values ('$id_transaksi','$id_pembeli','$tgl')";
    if(mysqli_query($koneksi,$sql)){
        foreach($_SESSION["session_transaksi"] as $hasil){
            $kode_sepeda=$hasil["kode_sepeda"];
            $jumlah=$_POST['jumlah_barang'.$hasil["kode_sepeda"]];
            $harga_beli=$hasil["harga"];
            $sql="insert into detail_transaksi values ('$id_transaksi','$kode_sepeda','$jumlah','$harga_beli')";
            mysqli_query($koneksi,$sql);
        }
        $_SESSION["session_transaksi"]=array();
    }
    // mysqli_query($koneksi,$sql);
    header("location:template_pembeli.php?page=nota&id_transaksi=$id_transaksi");
}
if (isset($_GET["hapus"])) {
    $kode_sepeda=$_GET["kode_sepeda"];
    $index=array_search($kode_sepeda,array_column($_SESSION["session_transaksi"],"kode_sepeda"));
    array_splice($_SESSION["session_transaksi"],$index,1);
    header("location:template_pembeli.php?page=list_transaksi");
}
?>