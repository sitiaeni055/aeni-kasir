<?php

    $id = $_GET['id'];
    $delete = $conn->query("DELETE FROM masakan WHERE id = '$id'");

    if($delete){
        header('location:home.php?halaman=list-produk');
    }
?>