<link rel="stylesheet" href="style1.css"/>
<?php 
$koneksi=mysqli_connect("localhost","root","","olshop");
$sql="select*from sepeda";
$result=mysqli_query($koneksi,$sql);
?>
<div class="bd-example card">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="1.png" width="100%" height="700" alt="...">
        <div class="carousel-caption d-none d-sm-block">
          <h5 class="text-dark">SEPEDA TERBARU!</h5>
          <p class="text-dark">Dengan desain yang lebih menarik</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="2.png" width="100%" height="700" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5 class="text-dark">SEPEDA KEREN!</h5>
          <p class="text-dark">Dengan desain yang kekinian</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="3.jpg"width="100%" height="700" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5 class="text-dark">SEPEDA MURAH!</h5>
          <p class="text-dark">Dengan harga yang terjangkau</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="row mx-auto">
    <?php foreach ($result as $hasil): ?>
        <div class="card col-sm-4 mt-4">
            <div class="card-body">
                <img src="img_sepeda/<?php echo $hasil["gambar"]; ?>" class="img" width="100%" >
            </div>
            <div class="card-footer">
                <h4 class="text-center"><?php echo $hasil["merk_sepeda"]; ?></h4>
                <h6 class="text-center">Rp.<?php echo $hasil["harga"]; ?>,-</h6>
                <h6 class="text-center">Stok: <?php echo $hasil["stok"]; ?></h6>
                <a class="btn btn-block btn-warning" href="db_transaksi.php?transaksi=true&kode_sepeda=<?php echo $hasil["kode_sepeda"]; ?>">
                    BELI
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>