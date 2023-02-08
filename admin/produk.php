<div class="row">
    <?php   
    include '../koneksi.php';
    $sql="select * from masakan order by id desc";
    $hasil=$conn->query($sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
        <div class="col-6 mt-5">
            <div class=" card thumbnail" >
                <a href="#"><img src="../image/<?php echo $data['gambar'];?>" width="70%" height="50%" alt="Cinque Terre"></a>
                <div class="caption">
                    <h3><?php echo $data['nama'];?></h3>
                    <h4>Rp. <?php echo number_format($data['harga']); ?> </h4>
                    <p><a href="home.php?halaman=<?php echo $data['id'];?>&aksi=keranjang_belanja&jumlah=1" class="btn btn-primary btn-block" role="button">Masukan Keranjang</a></p>
                </div>
            </div>
        </div>
        <div class="col-6mt-5">
            <div class=" card thumbnail" >
                
            </div>
        </div>
        <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
</div>