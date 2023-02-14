<?php
    session_start();
    $id_menu = $_GET["id"];
    unset($_SESSION["keranjang"][$id_menu]);
    echo "<script>alert('produk telah masuk keranjang belanja');</script>";
    header("location:home.php?halaman=produk");
?>