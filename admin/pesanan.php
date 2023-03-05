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
                            <th colspan="2">Aksi</th>
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
                                <button class="btn alert alert-danger p-1 "  data-bs-toggle="modal" data-bs-target="#exampleModa<?php echo $row['id'] ?>"><small>Belum</small></button>
                            <?php else : ?>
                                <button class="btn alert alert-success p-1 " ><small>Sudah</small></button>
                            <?php endif ?>
                            <!-- MENGECEK STATUS PEMBAYARAN -->
                            </td>
                            <td>
                                <a href="">
                                    <button class="btn btn-primary">
                                    <i class='bx bx-printer'></i>
                                    </button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger">
                                    <i class='bx bxs-trash'></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <!-- MENAMPILKAN MODAL UNTUK UBAH STATUS PEMBAYARAN -->
                        <div class="modal fade" id="exampleModa<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Status </label>
                                            <input type="text" name="table_id" value="<?php echo $row['table_id'] ?>">
                                            <input type="text" name="id_trans" value="<?php echo $row['id'] ?>">
                                            <select class="form-select" name="bayar">
                                                <option value="sudah" <?php if($row['bayar'] == 'sudah') echo"selected"; ?> >Sudah</option>
                                                <option value="belum" <?php if($row['bayar'] == 'belum') echo"selected"; ?> >Belum</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="form-control btn btn-primary" value="Ubah" name="btn-bayar">
                                        </div>
                                    </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- MENAMPILKAN MODAL UNTUK UBAH STATUS PEMBAYARAN -->
                    <?php
                    }
                    ?>
                </table>
                                            
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['btn-bayar'])){
    $id_trans = $_POST['id_trans'];
    $table_id = $_POST['table_id'];
    $bayar = $_POST['bayar'];
    echo $bayar;
    
    // UPDATE STATUS MEJA
    if ( $bayar = "sudah" ) {
        $conn->query("UPDATE tables SET status='kosong' WHERE id='$table_id'");
    } else {
        $conn->query("UPDATE tables SET status='terisi' WHERE id='$table_id'");
    }

    // UPDATE PEMBAYARAN
    $update_bayar = $conn->query("UPDATE pesanans SET bayar='$bayar' WHERE id='$id_trans'");
    if($update_bayar){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Pembayaran Berhasil Di Proses');
        window.location.href='home.php?halaman=pesanan';
        </script>"); 
    
    }
} 
?>


