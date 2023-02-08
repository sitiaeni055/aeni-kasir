<div class="row">
    <?php   
    include '../koneksi.php';
    $sql="select * from masakan order by id desc";
    $hasil=$conn->query($sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>







    <div class="row mt-2">
        <div class="col-md-8 mt-5">
            <div class="row ">
                <div class="col-md-4">
                    <div class="card">
                    <a href="#"><img src="../image/<?php echo $data['gambar'];?>" width="50%" height="30%" alt="Cinque Terre"></a>
                    <div class="caption">
                    <h3><?php echo $data['nama'];?></h3>
                    <h4>Rp. <?php echo number_format($data['harga']); ?> </h4>
                    <p><a href="home.php?halaman=<?php echo $data['id'];?>&aksi=keranjang_belanja&jumlah=1" class="btn btn-primary btn-block" role="button">Beli</a></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>  
     <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
</div>
