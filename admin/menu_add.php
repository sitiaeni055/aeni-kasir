<?php
if(isset($_POST['add'])){
    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $nama_gambar = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $add = $conn->query("INSERT INTO menus VALUE ('', '$nama', '$harga', '$nama_gambar', '$kategori')");

    if($add){
        move_uploaded_file($file_tmp, '../image/'.$nama_gambar);
        header('location:home.php?halaman=menu');
    }
} 
?>
<h2 class="text-center mt-5 ">Tambah Produk</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <section class="base">
        <div class="my-4">
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" autofocus="" required="" />
        </div>
        <div class="my-4">
            <label>Kategori</label>
            <select name="kategori" id="" class="form-control">
            <?php $result = $conn->query("SELECT * FROM kategoris"); ?>
            <?php while($row = $result->fetch_assoc()) : ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>
            
            <?php endwhile; ?>
            </select>
        </div>
        <div class="my-4">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga" required=""  />
        </div>
        <div class="my-4"> 
            <label>Poto menu</label>
            <input type="file" class="form-control" name="gambar" required=""  />
        </div>
        <div class="my-4">
            <button type="submit" name="add" class="btn btn-light">Tambah Menu</button>
        </div>
    </section>
</form>



