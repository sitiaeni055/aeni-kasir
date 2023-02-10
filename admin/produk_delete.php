<?php

    $id = $_GET['id'];
    $result = $conn->query("DELETE FROM masakan WHERE id = '$id'");

    if($result){
        header('location:home.php?halaman=list-produk');
    }
?>