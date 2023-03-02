<div class="row mt-4 pt-4">
    <div class="col-md-8">
        <div class="card border-0 card-h-100">
            <div class="card-header border-0 d-flex justify-content-between">                 
                
                <h4 class="d-inline">
                    Laporan
                    <button class="btn btn-success mx-2" onclick="printDiv('print')" type="submit" data-toggle="print" data-placement="right" title="print"><i class='bx bx-printer'></i></button>
                </h4>
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
            <fieldset id="print">
                <table class="table mt-4" >
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
                            <!-- CEK STATUS PEMBAYARAN UNTUK MENAMPILKAN TOMBOL BAYAR -->
                                <?php if($row["bayar"] == "belum") : ?>
                                <a href="pesanan_detail.php?id=<?php echo $row['id'] ?>">
                                    <button class="btn btn-primary">
                                        Bayar
                                    </button>
                                </a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                                   
            </div>
        </div>
    </div>
    <div class="col-md-4 p-3">
        <?php
            $result = $conn->query("SELECT SUM(total) AS total FROM pesanans");
            $row = mysqli_fetch_assoc($result);
            $sum = $row['total'];
        ?>
        <h3>Total Pendapatan</h3>
        <h4 class="mt-4">Total : Rp.<?php echo $sum ?></h4>
    </div>
    </fieldset> 
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript">
  function printDiv (el) {
    var a= document.body.innerHTML;
    var b= document.getElementById(el).innerHTML;

    document.body.innerHTML=b;
    window.print();
    dokument.body.innerHTML=a;
  }
</script>