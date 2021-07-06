<div class="card col-sm-12">
<div class="card-header">
<h4>Sepeda yang akan dibeli</h4>
</div>
<div class="card-body">
<form action="db_transaksi.php?checkout=true" method="post"
onsubmit="return confirm('Apakah anda yakin dengan pesanan ini?')">

<table class="table">
<thead>
<tr>
<th>Kode Sepeda</th>
<th>Merk Sepeda</th>
<th>Deskripsi</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Gambar</th>
<th>
OPTION
</th>
</tr>
</thead>
<tbody>
<?php foreach ($_SESSION["session_transaksi"] as $hasil):?>
<tr>
<td><?php echo $hasil["kode_sepeda"]; ?></td>
<td><?php echo $hasil["merk_sepeda"]; ?></td>
<td><?php echo $hasil["deskripsi"]; ?></td>
<td><?php echo $hasil["harga"]; ?></td>
<td>
<input type="number" name="jumlah_barang<?php echo $hasil["kode_sepeda"]; ?>" min="1">
</td>
<td>
<img src="img_sepeda/<?php echo $hasil["gambar"];?>" width="250" height="250" class="gambar">
</td>
<td>
<a href="db_transaksi.php?hapus=true&kode_sepeda=<?php echo $hasil["kode_sepeda"]; ?>">
<button type="button" class="btn btn-danger">Delete</button>
</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<button type="submit" class="btn btn-primary">Checkout</button>
</form>
<!-- <a href="db_transaksi.php?checkout=true" onclick="return confirm('Apakah anda yakin dengan pesanan ini?')">
<button type="button" class="btn btn-primary">Checkout</button>
</a> -->
</div>
</div>