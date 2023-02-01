<?php


    if(isset($_POST['add'])){
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $nama_gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $add = $conn->query("INSERT INTO masakan VALUE ('', '$nama', '$kategori', '$harga', '$stok', '$nama_gambar')");

        if($add){
            move_uploaded_file($file_tmp, '../image/'.$nama_gambar);
            header('location:home.php?halaman=list-produk');
        }
    } 

?>


<div class="">
    <h2 class="text-center mt-5 ">Tambah Produk</h2>
    <form method="POST" action="" enctype="multipart/form-data" >
      <section class="base">
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
        <div class="my-4">
         <button type="submit" name="add" class="btn btn-light">Tambah Produk</button>
        </div>
        </section>
      </form>

</div>



