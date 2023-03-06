<div class="row mt-4 pt-4">
    <div class="col-md-12">
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
            <div class="">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>No Meja</th>
                            <th>Pelayan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT pesanans.id, pesanans.nama_pelanggan, pesanans.table_id, pesanans.bayar, pesanans.tanggal, pesanans.total, tables.table_nama, pelayans.pelayan_nama
                    FROM  tables
                    INNER JOIN pesanans
                    on pesanans.table_id = tables.id
                    INNER JOIN pelayans
                    on pelayans.id = pesanans.pelayan_id ORDER BY pesanans.tanggal DESC";
                    $result = $conn->query($sql);
                    $no = 1;
                    while ($row=$result->fetch_assoc()){
                        
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row["nama_pelanggan"]?></td>
                            <td><?php echo $row["table_nama"]?></td>
                            <td><?php echo $row["pelayan_nama"]?></td>
                            <td><?php echo $row["tanggal"]?></td>
                            <td>Rp. <?php echo number_format($row["total"])?></td>
                            <td>
                            <!-- MENGECEK STATUS PEMBAYARAN -->
                            <?php if($row["bayar"] == "belum") : ?>
                                <button class="btn alert alert-danger p-1 " ><small>Belum</small></button>
                            <?php else : ?>
                                <button class="btn alert alert-success p-1 " ><small>Sudah</small></button>
                            <?php endif ?>
                            <!-- MENGECEK STATUS PEMBAYARAN -->
                            </td>
                            <td>
                                <a href="home.php?halaman=pesanan-invoice">
                                    <button class="btn btn-primary">
                                    <i class='bx bx-printer'></i>
                                    </button>
                                </a>
                                <a href="home.php?id=<?php echo $row['id']?>&halaman=pesanan-delete">
                                    <button class="btn btn-danger">
                                    <i class='bx bxs-trash'></i>
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
</div>