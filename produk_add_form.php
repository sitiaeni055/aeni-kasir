<?php
    include "koneksi.php";
    if(isset($_POST['add'])){
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $add = $conn->query("INSERT INTO masakan VALUE ('', '$nama', '$kategori', '$harga', '$stok')");

        if($add){
            header('location:product_list.php');
        }
    } 

?>



<form action="" method="post">
    <input type="text" name="nama_produk" placeholder="Nama produk"><br>
    <input type="text" name="kategori" placeholder="Kategori"><br>
    <input type="text" name="harga" placeholder="Harga"><br>
    <input type="text" name="stok" placeholder="Stok"><br>
    <input type="submit" name="add" value="tambah data produk">
</form>