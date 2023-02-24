<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $edit = $conn->query("SELECT * FROM menus WHERE id='$id'");
?>
    <form action="" method="post">
<?php
    while($data = mysqli_fetch_array($edit)){
?>
    <input type="text" name="id" value="<?php echo $data['id']?>"><br>
    <input type="text" name="nama" value="<?php echo $data['nama']?>"><br>
    <input type="text" name="kategori" value="<?php echo $data['kategori']?>"><br>
    <input type="text" name="harga" value="<?php echo $data['harga']?>"><br>
    <input type="text" name="stok" value="<?php echo $data['stok']?>"><br>
    <input type="submit" name="edit" value="Edit">
<?php
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $update = $conn->query("UPDATE masakan SET nama='$nama', kategori='$kategori', harga='$harga', stok='$stok' WHERE id='$id'");
        if($update){
            header('location:product_list.php');
        }
    }
?>
    </form>