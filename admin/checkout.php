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
            $totalbayar = 0;
        ?>
        <?php foreach ($_SESSION['keranjang'] as $id_menu => $jumlah): ?>
        <?php
            $ambil = $conn->query("SELECT * FROM menus WHERE id = '$id_menu'");
            $pecah = $ambil->fetch_assoc();
            $Subharga = $pecah['harga']*$jumlah;
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pecah['nama_menu'];?></td>
                <td>Rp.<?php echo number_format ($pecah['harga']);?></td>
                <td><?php echo $jumlah;?></td>
                <td>Rp.<?php echo number_format($Subharga);?></td>  
            </tr>
        <?php $totalbayar+=$Subharga; ?>
        <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Bayar</td>
                <td>Rp.<?php echo number_format($totalbayar) ?></td>
            </tr>
        </tfoot>
    </table>
        <form action="" method="post" class="form-horizontal ">
            <section class="base">
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">Nama Pelanggan</label>
                    <div class="col-sm-7 float-right">
                        <input type="text"  class="form-control" name="nama_pelanggan" autofocus="" required=""  value="<?php echo $_SESSION["list_pelanggan"]['nama_pelanggan'] ?>"/>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">No Meja</label>
                    <div class="col-sm-7 float-right">
                        <select class="form-select" aria-label="Default select example" name="id_meja">
                            <option selected>Meja</option>
                            <?php 
                            $sql = $conn->query("SELECT * FROM meja");
                            while ($meja = $sql->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $meja["id_meja"] ?>">
                                <?php echo $meja['nomor_meja']?>    
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">Waiters</label>
                    <div class="col-sm-7 float-right">
                    <select class="form-select" aria-label="Default select example" name="id_meja">
                            <option selected>Nama Waiters</option>
                            <?php 
                            $sql = $conn->query("SELECT * FROM waiters");
                            while ($waiters = $sql->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $waiters["id_waiters"] ?>">
                                <?php echo $waiters['nama_waiters']?> 
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label for="nama" class="control-label col-sm-5">Tanggal</label>
                    <div class="col-sm-7 float-right">
                        <input type="date"  class="form-control" name="tanggal" autofocus="" required="" id="tanggal"/>
                    </div>
                </div>
                <button class="btn btn-light" name="checkout">Bayar</button>
            </section>
        </form>
        <?php
        if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["list_pelanggan"]["id_pelanggan"];
            $meja = $_POST["id_meja"];
            $tanggal = date("Y-m-d");
        }
            $conn->query("INSERT INTO transaksi(id_transaksi")
       
        ?>
</div>
