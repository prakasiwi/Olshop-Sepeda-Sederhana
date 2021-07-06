<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    // function Add(){
    //     document.getElementById('action').value="insert";
    //     document.getElementById("id_pembeli").value="";
    //     document.getElementById("nama").value="";
    //     document.getElementById("kontak").value="";
    //     document.getElementById("alamat").value="";
    // }
    function Edit(index){
        document.getElementById('action').value="update";
        var table=document.getElementById("table_pembeli");
        var id_pembeli =table.rows[index].cells[0].innerHTML;
        var nama =table.rows[index].cells[1].innerHTML;
        var username =table.rows[index].cells[2].innerHTML;
        var password =table.rows[index].cells[3].innerHTML;
        var kontak =table.rows[index].cells[4].innerHTML;
        var alamat =table.rows[index].cells[5].innerHTML;
        document.getElementById("id_pembeli").value=id_pembeli;
        document.getElementById("nama").value=nama;
        document.getElementById("username").value=username;
        document.getElementById("password").value=password;
        document.getElementById("kontak").value=kontak;
        document.getElementById("alamat").value=alamat;
    }
    </script>
        <div class="card col-sm-12">
            <div class="card-header">
                <h4>Data Pembeli</h4>
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
                $sql = "select * from pembeli";
                $result = mysqli_query($koneksi,$sql);
                $count = mysqli_num_rows($result);
            ?>
            <?php if($count == 0): ?>
            <div class="alert alert-info">
                Data belum tersedia
            </div>
            <?php else: ?>
            <table class="table" id="table_pembeli">
                <thead>
                    <tr>
                        <th>ID Pembeli</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Gambar</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $hasil): ?>
                    <tr>
                        <td><?php echo $hasil["id_pembeli"]; ?></td>
                        <td><?php echo $hasil["nama"]; ?></td>
                        <td><?php echo $hasil["username"]; ?></td>
                        <td><?php echo $hasil["password"]; ?></td>
                        <td><?php echo $hasil["kontak"]; ?></td>
                        <td><?php echo $hasil["alamat"]; ?></td>
                        <td>
                            <img src="<?php echo "img_pembeli/".$hasil["gambar"]; ?>"
                            class="img" width="250">
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning"
                            data-toggle="modal" data-target="#modal"
                            onclick="Edit(this.parentElement.parentElement.rowIndex);">
                        Edit
                    </button>

                    <a href="db_pembeli.php?hapus=pembeli&id_pembeli=<?php echo $hasil["id_pembeli"]; ?>"
                    onclick="return confirm('Apakah ingin menghapus data?') ">
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
            <!-- <div class="card-footer">
                <button type="button" class="btn btn-success"
                data-toggle="modal" data-target="#modal" onclick="Add()">
            Tambah
        </button>
            </div> -->
        </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="db_pembeli.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4>Form Pembeli</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" id="action">
                        ID Pembeli
                        <input type="text" name="id_pembeli" id="id_pembeli" class="form-control">
                        Nama
                        <input type="text" name="nama" id="nama" class="form-control">
                        Username
                        <input type="text" name="username" id="username" class="form-control">
                        Password
                        <input type="password" name="password" id="password" class="form-control">
                        Kontak
                        <input type="text" name="kontak" id="kontak" class="form-control">
                        Alamat
                        <input type="text" name="alamat" id="alamat" class="form-control">
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

