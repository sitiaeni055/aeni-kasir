<div class="row mt-4 pt-4">
    <div class="col-md-6">
        <div class="card border-0 card-h-100">
            <div class="card-header border-0 d-flex justify-content-between">                 
                
                <h4 class="d-inline">
                    Recent orders
                </h3>
                <div class="dropdown">
                    <a href="" class="dropdown-toggle no-arrow text-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu">
                        <a href="javascript: void(0);" class="dropdown-item">
                            Export report
                        </a>
                        <a href="javascript: void(0);" class="dropdown-item">
                            Share
                        </a>
                        <a href="javascript: void(0);" class="dropdown-item">
                            Action
                        </a>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class=" h-50 table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Produk</td>
                            <td>Kategori</td>
                            <td>Harga</td>
                            <td>Stok</td>
                            <td>Gambar</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM kategoris
                    INNER JOIN menus
                    ON kategoris.id = menus.kategori_id  ";
                    $result = $conn->query($sql);
                    $no = 1;
                    while ($row=$result->fetch_assoc()){
                        
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row["nama_menu"]?></td>
                            <td><?php echo $row["nama"]?></td>
                            <td><?php echo $row["harga"]?></td>
                            <td><?php echo $row["stock"]?></td>
                            <td><img width="70" src="../image/<?php echo $row["gambar"]?>" alt=""></td>
                            <td>
                            <a href="keranjang_belanja.php?id=<?php echo $row['id'] ?>">
                                <button class="btn btn-primary">
                                    <i class='bx bx-plus'></i>
                                </button>
                            </a>
                            
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                                            
            </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="card border-0 card-h-100">
        <div class="card-header border-0 d-flex justify-content-between">                 
            <h4 class="d-inline">
                Pesanan
            </h3>
            <div class="dropdown">
                <a href="" class="dropdown-toggle no-arrow text-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>
                <div class="dropdown-menu">
                    <a href="javascript: void(0);" class="dropdown-item">
                        Export report
                    </a>
                    <a href="javascript: void(0);" class="dropdown-item">
                        Share
                    </a>
                    <a href="javascript: void(0);" class="dropdown-item">
                        Action
                    </a>
                </div>
            </div>
        </div>
        
        <?php if (isset($_SESSION['keranjang'] )): ?>
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
                    $total_bayar = 0;
                    ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah): ?>
                    <?php
                        $ambil = $conn->query("SELECT * FROM menus WHERE id = '$id_menu'");
                        $pecah = $ambil->fetch_assoc();
                        $Subharga = $pecah['harga'] * $jumlah;
                        
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pecah['nama_menu'];?></td>
                        <td>Rp.<?php echo number_format ($pecah['harga']);?></td>
                        <td><?php echo $jumlah;?></td>
                        <td>Rp.<?php echo number_format($Subharga);?></td>
                        <td>
                            <input type="hidden" name="harga" value="<?php echo $row['harga'] ?>">
                            <a href="keranjang_delete.php?id=<?php echo $pecah['id'] ?>" class="text-danger">
                                    <i class='bx bx-trash' ></i>
                            </a>
                        </td>
                    </tr>
                    <?php $total_bayar+=$Subharga ?>
                    <?php endforeach ?>
                </tbody> 
                <tfoot>
                    <tr>
                        <th colspan="4">Total Bayar</th>
                        <th colspan="4">Rp. <?php echo number_format($total_bayar) ?></th>
                    </tr>
                </tfoot>
            </table>
            <form action="keranjang_save.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nama</span>
                </div>
                <input type="text" class="form-control" name="nama_pelanggan">
                <input type="hidden" class="form-control" name="total" value="<?php echo $total_bayar ?>">
            </div>   
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">No Meja</span>
                </div>
                <!-- MENGAMBIL DATA DARI TABLE TABLES -->
                <select class="form-control" name="table_id">
                <?php $query_meja = $conn->query("SELECT * FROM tables WHERE status='kosong'") ?>
                <?php while($meja = $query_meja->fetch_assoc()) : ?>
                    <option value="<?php echo $meja['id'] ?>"><?php echo $meja['table_nama'] ?></option>
                <?php endwhile ?>
                </select>
                <!-- / MENGAMBIL DATA DARI TABLE TABLES -->
            </div> 
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Pelayan</span>
                </div>
                <!-- MENGAMBIL DATA DARI TABLE PELAYANS -->
                <select class="form-control" name="pelayan_id">
                <?php $query_pelayan = $conn->query("SELECT * FROM Pelayans") ?>
                <?php while($pelayan = $query_pelayan->fetch_assoc()) : ?>
                    <option value="<?php echo $pelayan['id'] ?>"><?php echo $pelayan['pelayan_nama'] ?></option>
                <?php endwhile ?>
                </select>
                <!-- / MENGAMBIL DATA DARI TABLE PELAYANS -->
            </div> 
            <button class="btn btn-dark" name="keranjangsave" type="submit">Simpan</button>
            </form>
            <?php else : ?>
                keranjang kosong
            <?php endif ?>
    </div>
</div>



