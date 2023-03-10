<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    include "../koneksi.php";
?>

<table class="table mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
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
                <button class="btn alert alert-danger p-1 "  data-bs-toggle="modal" data-bs-target="#exampleModa<?php echo $row['id'] ?>"><small>Belum</small></button>
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