<?php
    $id = $_GET['id'];
    $result = $conn->query("DELETE FROM menus WHERE id = '$id'");

    if($result){
        header('location:home.php?halaman=menu');
    }
?>