<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function Add(){
        document.getElementById('action').value="insert";
        document.getElementById("kode_sepeda").value="";
        document.getElementById("merk_sepeda").value="";
        document.getElementById("deskripsi").value="";
        document.getElementById("harga").value="";
    }
    function Edit(index){
        document.getElementById('action').value="update";
        var table=document.getElementById("table_sepeda");
        var kode_sepeda=table.rows[index].cells[0].innerHTML;
        var merk_sepeda=table.rows[index].cells[1].innerHTML;
        var deskripsi=table.rows[index].cells[2].innerHTML;
        var harga=table.rows[index].cells[3].innerHTML;
        var stok=table.rows[index].cells[4].innerHTML;
        document.getElementById("kode_sepeda").value=kode_sepeda;
        document.getElementById("merk_sepeda").value=merk_sepeda;
        document.getElementById("deskripsi").value=deskripsi;
        document.getElementById("harga").value=harga;
        document.getElementById("stok").value=stok;
    }
    </script>
        <div class="card col-sm-12">
            <div class="bg-primary card-header">
                <h4>Daftar Sepeda</h4>
            </div>
            <div class="card-body">
            <?php if (isset($_SESSION["message"])): ?>
    <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
        <?php echo $_SESSION["message"]["message"]; ?>
        <?php unset ($_SESSION["message"]); ?>
    </div>
        <?php endif; ?>
                <?php 
                    $koneksi = mysqli_connect("localhost","root","","olshop");
                    $sql = "select * from sepeda";
                    $result = mysqli_query($koneksi,$sql);
                    $count = "mysqli_num_rows"($result);
                ?>
                <?php if($count==0): ?>
                <div class="alert alert-light">
                    Barang belum tersedia
                </div>
                <?php else: ?>
                <table class="table" id="table_sepeda">
                    <thead>
                        <tr>
                            <th>Kode Sepeda</th>
                            <th>Merk Sepeda</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $hasil): ?>
                        <tr>
                            <td><?php echo $hasil["kode_sepeda"]; ?></td>
                            <td><?php echo $hasil["merk_sepeda"]; ?></td>
                            <td><?php echo $hasil["deskripsi"]; ?></td>
                            <td><?php echo $hasil["harga"]; ?></td>
                            <td><?php echo $hasil["stok"]; ?></td>
                            <td>
                                <img src="<?php echo "img_sepeda/".$hasil["gambar"]; ?>"
                                class="img" width="250"> 
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning"
                                data-toggle="modal" data-target="#modal"
                                onclick="Edit(this.parentElement.parentElement.rowIndex);">
                                Edit
                            </button>

                            <a href="db_sepeda.php?hapus=sepeda&kode_sepeda=<?php echo $hasil["kode_sepeda"]; ?>"
                            onclick="return confirm('Apakah Anda ingin menghapus data ini?')">
                            <button type="button" class="btn btn-danger my-2">
                                Hapus
                            </button>
                        </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-success"
                data-toggle="modal" data-target="#modal" onclick="Add();">
            Tambah</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="db_sepeda.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4>Form Daftar Sepeda</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" id="action">
                         Kode Sepeda
                         <input type="text" name="kode_sepeda" id="kode_sepeda" class="form-control">
                         Merk Sepeda
                         <input type="text" name="merk_sepeda" id="merk_sepeda" class="form-control">
                         Deskripsi
                         <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                         Harga
                         <input type="text" name="harga" id="harga" class="form-control">
                         Stok
                         <input type="text" name="stok" id="stok" class="form-control">
                         Gambar
                         <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                        Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
