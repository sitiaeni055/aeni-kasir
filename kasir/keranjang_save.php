<?php 
    session_start();
    include_once "../koneksi.php";

    if (isset($_POST["keranjangsave"])){
        $nama_pelanggan = $_POST["nama_pelanggan"];
        $table_id = $_POST["table_id"];
        $pelayan_id = $_POST["pelayan_id"];
        $tanggal = date("Y-m-d");
        $total = $_POST["total"];

        $pesanan_sava = $conn->query("INSERT INTO pesanans Value ('', '$nama_pelanggan', '$table_id', '$pelayan_id', '$tanggal', '$total', 'belum')");
        // MENGAMBIL ID PESANAN TERBARU
        $pesanan_id = $conn->insert_id;
        
        

        
        echo $pesanan_id;
        foreach ($_SESSION["keranjang"] as $menu_id => $jumlah){
            $conn->query("INSERT INTO pesanan_details Value ('', '$pesanan_id', '$menu_id', '$jumlah')");
        }
       // MENGUPDATE STATUS TABLE TABLES
       $table_update = $conn->query("UPDATE `tables` SET `status` = 'terisi' WHERE `id` = '$table_id'");

    }
?>
<pre><?php print_r($_SESSION["keranjang"]) ?></pre>