<?php
    include "../koneksi.php";
?>
<div class="col-md-6 mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Masakan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subharga</th>
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
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
        <form action="" method="post" class="form-horizontal ">
            <section class="base">
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">Nama Pelanggan</label>
                    <div class="col-sm-7 float-right">
                        <input type="text"  class="form-control" name="nama_produk" autofocus="" required="" id="nama" />
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">No Meja</label>
                    <div class="col-sm-7 float-right">
                        <select class="form-select" aria-label="Default select example" name="id_meja">
                            <option selected>Meja</option>
                            <?php 
                            $sql = $conn->query("SELECT * FROM meja");
                            while ($sql = $ambil->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $meja["id_meja"] ?>">
                                <?php echo $meja['nomor_meja']?> -
                                <?php echo $meja['status']?> 
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">Waiters</label>
                    <div class="col-sm-7 float-right">
                        <input type="text"  class="form-control" name="waiters" autofocus="" required="" id="waiters"/>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">Tanggal</label>
                    <div class="col-sm-7 float-right">
                        <input type="date"  class="form-control" name="waiters" autofocus="" required="" id="waiters"/>
                    </div>
                </div>
            </section>
        </form>
</div>
