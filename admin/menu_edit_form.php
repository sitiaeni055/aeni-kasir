
<?php
    include "../koneksi.php";
    $id = $_GET['id'];
    $sql ="SELECT * FROM menu WHERE id='$id'";
    $id = $_GET['id'];
    $edit = $conn->query($sql);
?>
<div class="edit mt-5">
   <form method="POST" action="" enctype="multipart/form-data" >
<?php
    while($row=$edit->fetch_assoc()){
?>
      <section class="base mt-4">
        <div class="my-4">
          <label>No</label>
          <input type="text" class="form-control" name="id" autofocus="" required="" value="<?php echo $row['id'];?>"/>
        </div>
        <div class="my-4">
          <label>Nama Produk</label>
          <input type="text" class="form-control" name="nama" autofocus="" required="" value="<?php echo $row['nama']?>"/>
        </div>
        <div class="my-4">
          <label>Kategori</label>
         <input type="text" class="form-control" name="kategori" value="<?php echo $row['kategori'];?>"/>
        </div>
        <div class="my-4">
          <label>Harga</label>
         <input type="text" class="form-control" name="harga" required=""  value="<?php echo $row['harga'];?>"/>
        </div>
        <div class="my-4"> 
          <label>Stok</label>
         <input type="text" class="form-control" name="stok" required=""  value="<?php echo $row['stok'];?>"/>
        </div>
        <div class="my-4"> 
          <label>Gambar Produk</label>
         <input type="file" class="form-control" name="gambar"value="<?php echo $row['gambar'];?> "/>
        </div>
        <button type="submit" name="edit" class="btn btn-light">Edit</button>
        </div>
        </section>
    </form>
</div>
   
<?php
    } if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $nama_gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $update = $conn->query("UPDATE masakan SET nama='$nama', kategori='$kategori', harga='$harga', stok='$stok', gambar='$nama_gambar' WHERE id='$id'");
        if($update){
            move_uploaded_file($file_tmp, '../image/'.$nama_gambar);
            header('location:home.php?halaman=list-produk');
        }
    } 
?>
    </form>