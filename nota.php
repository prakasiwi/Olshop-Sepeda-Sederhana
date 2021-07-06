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
<h3>Nota Online</h3>
</div>
<div class="card-body">
<?php 
$koneksi=mysqli_connect("localhost","root","","olshop");
$id_transaksi=$_GET["id_transaksi"];
$sql="select t.id_transaksi, p.nama, t.tgl
from transaksi t inner join pembeli p
on t.id_pembeli=p.id_pembeli
where t.id_transaksi='$id_transaksi'";
$result = mysqli_query($koneksi,$sql);
$hasil=mysqli_fetch_array($result);

$sql2="select b.*, dt.jumlah, dt.harga_beli
from sepeda b inner join detail_transaksi dt
on b.kode_sepeda=dt.kode_sepeda
where dt.id_transaksi='$id_transaksi'";
$result2=mysqli_query($koneksi,$sql2);
?>

<h4>ID. Transaksi: <?php echo $hasil["id_transaksi"]; ?></h4>
<h4>Nama Pemesan: <?php echo $hasil["nama"]; ?></h4>
<h4>Tgl. Transaksi: <?php echo $hasil["tgl"]; ?></h4>

<table class="table">
<thead>
<tr>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Jumlah Item</th>
<th>Harga</th>
<th>Total</th>
</tr>
</thead>
<tbody>
<?php $total = 0; foreach($result2 as $barang): ?>
<tr>
<td><?php echo $barang["kode_sepeda"]; ?></td>
<td><?php echo $barang["merk_sepeda"]; ?></td>
<td><?php echo $barang["jumlah"]; ?></td>
<td><?php echo "Rp ".number_format($barang["harga"]); ?></td>
<td><?php echo "Rp ".number_format($barang["harga"]*$barang["jumlah"]); ?></td>
</tr>
<?php 
$total += $barang["harga"]*$barang["jumlah"];
endforeach; ?>
</tbody>
</table>
<h2 class="text-right text-success">
<?php echo "Rp ".number_format($total); ?>
</h2>
<button onclick="Print()" type="button" class="btn btn-success">
Cetak
</button>
</div>
</div>