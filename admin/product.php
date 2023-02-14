
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="col-md-12">
                    <div class="row">

                    
                <?php
                    $query = "SELECT * FROM masakan";
                    $result = $conn->query($query);

                    while ($row=$result->fetch_assoc()){
                ?>
                    <div class="card col-md-3 py-2 mb-2 p-2 mx-1">
                            <img src="../image/<?= $row['gambar'] ?>" alt="" width="100" height="80">
                            <h6> <?php echo $row['nama']; ?> </h6>
                            <h5>Rp<?php echo number_format($row['harga']); ?> </h5>
                            <input type="hidden" name="harga" value="<?php echo $row['harga'] ?>">
                            <a href="keranjang_belanja.php?id=<?php echo $row['id'] ?>"> <button class="btn btn-primary">  Tambah</button></a>
                    </div>
                    <?php }
                
                
                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Masakan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $no = 1;
                        ?>
                        <?php foreach ($_SESSION['keranjang'] as $id_menu => $jumlah): ?>
                        <?php
                            $ambil = $conn->query("SELECT * FROM masakan WHERE id = '$id_menu'");
                            $pecah = $ambil->fetch_assoc();
                            $Subharga = $pecah['harga']*$jumlah;
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pecah['nama'];?></td>
                            <td>Rp.<?php echo number_format ($pecah['harga']);?></td>
                            <td><?php echo $jumlah;?></td>
                            <td>Rp.<?php echo number_format($Subharga);?></td>
                            <td>
                                <a href="keranjang_delete.php?id=<?php echo $pecah['id'] ?>"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
