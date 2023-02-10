
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
                    <div class="card col-md-4 py-2 mb-2 p-2">
                        <form action="" method="post">
                            <img src="../image/<?= $row['gambar'] ?>" alt="" width="100" height="80">
                            <h6><?php echo $row['nama'];?></h6>
                            <h5>Rp<?php echo number_format($row['harga']); ?> </h5>
                            <input type="hidden" name="nama" value="<?php= $row['nama'] ?>">
                            <input type="hidden" name="harga" value="<?php= $row['harga'] ?>">
                            <input type="number" name="quantity" value="0" class="form-control">
                            <a href="home.php?halaman=produk"><input type="submit" name="" class="btn btn-warning btn-block my-2" value="Tambah"></a>
                        </form>
                    </div>
                    <?php }
                
                
                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                
            </div>
        </div>
    </div>
</div>
