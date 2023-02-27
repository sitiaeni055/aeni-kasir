<?php

session_start();
$id_menu = $_GET["id"];

if (isset($_SESSION["keranjang"][$id_menu])) {
    $_SESSION["keranjang"][$id_menu]+=1;
}else {
    $_SESSION["keranjang"][$id_menu] = 1;
}

header("location:home.php?halaman=produk");
?>
