<?php
    include "../koneksi.php";

    $id = $_GET['id'];
    $delete = $conn->query("DELETE FROM pesanans WHERE id = '$id'");

    if($delete){
        header('location:home.php?halaman=pesanan');
    }
?>