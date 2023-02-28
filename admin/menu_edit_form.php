
<?php
    include "../koneksi.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM menus WHERE id='$id'";
    $edit = $conn->query($sql);
?>

<?php
    while($row=$edit->fetch_assoc()){
?>
<div class="edit mt-5">
<form method="post" action="" enctype="multipart/form-data" >
      <section class="base mt-4">
        <div class="my-4">
          <label>No</label>
          <input type="text" class="form-control" name="id" autofocus="" required="" value="<?php echo $row['id'];?>"/>
        </div>
        <div class="my-4">
          <label>Nama Produk</label>
          <input type="text" class="form-control" name="nama_menu" autofocus="" required="" value="<?php echo $row['nama_menu']?>"/>
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
            <input type="text" class="form-control" name="harga" required="" />
        </div>
        <div class="my-4">
            <label>Stok</label>
            <input type="text" class="form-control" name="stock" required="" />
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
    } 
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama_menu'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stock'];
        $nama_gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $update = $conn->query("UPDATE menus SET nama_menu='$nama', kategori_id='$kategori', harga='$harga', stock='$stok', gambar='$nama_gambar' WHERE id='$id'");
        if($update){
            move_uploaded_file($file_tmp, '../image/'.$nama_gambar);
            header('location:home.php?halaman=menu');
        }
    } 
?>
    </form>