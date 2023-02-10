<?php
    include "../koneksi.php";
    $id = $_GET['id'];
    $edit = $conn->query("SELECT * FROM masakan WHERE id='$id'");
?>
    <form action="" method="post">
<?php
    while($data = mysqli_fetch_array($edit)){
?>
<div class="edit mt-5">
   <form method="POST" action="" enctype="multipart/form-data" >
      <section class="base mt-4">
        <div class="my-4">
          <label>Nama Produk</label>
          <input type="text" class="form-control" name="nama_produk" autofocus="" required="" />
        </div>
        <div class="my-4">
          <label>Kategori</label>
         <input type="text" class="form-control" name="kategori" />
        </div>
        <div class="my-4">
          <label>Harga</label>
         <input type="text" class="form-control" name="harga" required=""  />
        </div>
        <div class="my-4"> 
          <label>Stok</label>
         <input type="text" class="form-control" name="stok" required=""  />
        </div>
        <div class="my-4"> 
          <label>Gambar Produk</label>
         <input type="file" class="form-control" name="gambar" required=""  />
        </div>
        <button type="submit" name="add" class="btn btn-light">Edit</button>
        </div>
        </section>
    </form>
</div>
   
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
            header('location:home.php?halaman=list-produk');
        }
    }
?>
    </form>