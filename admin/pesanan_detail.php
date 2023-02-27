<?php 
    session_start();
    include_once "../koneksi.php";
    $pesanan_id = $_GET["id"];
    
    $sql = "SELECT pesanans.id, pesanans.table_id, pesanans.nama_pelanggan, pesanans.bayar, pesanans.tanggal, pesanans.total, tables.table_nama, pelayans.pelayan_nama
    FROM  tables
    INNER JOIN pesanans
    on pesanans.table_id = tables.id
    INNER JOIN pelayans
    on pelayans.id = pesanans.pelayan_id WHERE pesanans.id ='$pesanan_id'";
    $result = $conn->query($sql);
    $hasil = $result->fetch_assoc();

    $conn->query("UPDATE tables SET status='kosong' WHERE id='$hasil[table_id]'");