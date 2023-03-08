<button class="btn btn-success mx-2 mt-5" onclick="printDiv('print')" type="submit" data-toggle="print" data-placement="right" title="print"><i class='bx bx-printer'></i></button>

<div class="row pt-4" id="print">

    <div class="col-md-12">
        <div class="card border-0 card-h-100">
            <div class="card-header border-0 d-flex justify-content-between">                 
                
                <h4 class="d-inline">
                    Laporan
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
            <div class="row">
            <div class="col-8 col-sm-8">
            
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
                            
                    </tr>
                <?php
                }
                ?>
            </table>
                                   
        </div> 
        
        <div class="col-3 p-3 col-sm-3">
            <?php
                $result = $conn->query("SELECT SUM(total) AS total FROM pesanans");
                $row = mysqli_fetch_assoc($result);
                $sum = $row['total'];
            ?>
            <h3 class="mt-4">Total : Rp.<?php echo $sum ?></h3>
        </div>
            </div>
        </div>
    </div>
  
   
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