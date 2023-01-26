<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM masakan WHERE id = '$id'");

    if($delete){
        header('location:product_list.php');
    }
?>