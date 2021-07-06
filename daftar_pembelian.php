<script type="text/javascript">
function Print(){
    var printDocument=document.getElementById("report").innerHTML;
    var originalDocument=document.body.innerHTML;
    document.body.innerHTML=printDocument;
    window.print();
    document.body.innerHTML=originalDocument;
}
</script>

<div id="report" class="card col-sm-12">
<div class="card-header">
<h3>Daftar Pembelian</h3>
</div>
<div class="card-body">
<?php 
$koneksi=mysqli_connect("localhost","root","","olshop");
$sql="select transaksi.*,pembeli.nama
from transaksi inner join pembeli
on transaksi.id_pembeli=pembeli.id_pembeli";
$result=mysqli_query($koneksi,$sql);
?>

<table class="table">
    <thead>
        <tr>
            <th>Tanggal Pembelian</th>
            <th>ID Transaksi</th>
            <th>Nama Pembeli</th>
            <th>OPSI</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($result as $hasil): ?>
    <tr>
    <td><?php echo $hasil["tgl"]; ?></td>
    <td><?php echo $hasil["id_transaksi"]; ?></td>
    <td><?php echo $hasil["nama"]; ?></td>
    <td>
    <a href="template.php?page=nota&id_transaksi=<?php echo $hasil["id_transaksi"]; ?>">
    <button type="button" class="btn btn-info">Detail</button>
    </a>
    </td>
    </tr>
    <?php  endforeach;?>
    </tbody>
</table>

<button onclick="Print()" type="button" class="btn btn-success">
Cetak
</button>

<!-- <ul class="list-group">
<?php foreach($result as $hasil): ?>
<li class="list-group-item">
<h5>Pembeli: <?php echo $hasil["nama"]; ?>/<?php echo $hasil["id_transaksi"]; ?></h5>
<h5>Daftar Transaksi:</h5>
<?php 
$sql2="select sepeda.*
from detail_transaksi inner join sepeda
on detail_transaksi.kode_sepeda=sepeda.kode_sepeda
where detail_transaksi.id_transaksi='".$hasil["id_transaksi"]."'"; 
$result2=mysqli_query($koneksi,$sql2);
 ?>
 <ul>
 <?php foreach ($result2 as $hasil2): ?>
<li><?php echo $hasil2["kode_sepeda"]."/".$hasil2["merk_sepeda"]; ?></li>
<?php  endforeach;?>
 </ul>
</li>
<?php endforeach; ?>
</ul> -->
</div>
</div>