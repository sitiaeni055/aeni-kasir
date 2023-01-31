<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $delete = $conn->query("DELETE FROM masakan WHERE id = '$id'");

    if($delete){
        header('location:product_list.php');
    }
?>