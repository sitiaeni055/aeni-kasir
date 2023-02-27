<?php
    include "../koneksi.php";

    $id = $_GET['id'];
    $delete = $conn->query("DELETE FROM tables WHERE id = '$id'");

    if($delete){
        header('location:home.php?halaman=meja');
    }
?>