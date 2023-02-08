<?php
    include "../koneksi.php";
?>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h3>Shopping</h3>
                <div class="col-md-12">
                    <div class="row">

                    
                <?php
                    $query = "SELECT * FROM masakan order by id desc";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_array($result)){?>
                    <div class="col-md-4">
                        <form action="" method="get">
                            <img src="../image/<?= $row['gambar'] ?>" alt="" width="50">
                            <h3><?= $row['nama']; ?></h3>
                            <h3>Rp<?= number_format($row['harga'],); ?></h3>
                        </form>
                    </div>
                    <?php }
                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>