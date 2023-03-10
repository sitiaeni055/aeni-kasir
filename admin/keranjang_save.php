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
        
        foreach ($_SESSION["keranjang"] as $menu_id => $jumlah){

            // MEMASUKAN KE TABEL PESANAN_DETAIL
            $conn->query("INSERT INTO pesanan_details Value ('', '$pesanan_id', '$menu_id', '$jumlah')");

            // MEMILIH MENU DI TABEL MENU
            $query_menu = $conn->query("SELECT * FROM menus WHERE id='$menu_id'");
            $get_menu = $query_menu->fetch_assoc();

            // MENGURANGI STOCK
            $update_stock = $get_menu["stock"] - $jumlah;

            // UPDATE STCOK KE TABEL MENUS
            $conn->query("UPDATE menus SET stock='$update_stock' WHERE id='$menu_id'");

        }
       // MENGUPDATE STATUS TABLE TABLES
       $table_update = $conn->query("UPDATE `tables` SET `status` = 'terisi' WHERE `id` = '$table_id'");
        
        // MENGHAPUS SESSION KERANJANG
        unset($_SESSION["keranjang"]);
        if ( $table_update ) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Pesanan Berhasil Ditambahkan');
            window.location.href='home.php?halaman=pesanan';
            </script>"); 
        }
    }
    
?>