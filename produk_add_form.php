<?php
    include "bot.php";
    include "koneksi.php";
    if(isset($_POST['add'])){
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $nama_gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $add = $conn->query("INSERT INTO masakan VALUE ('', '$nama', '$kategori', '$harga', '$stok', '$nama_gambar')");

        if($add){
            move_uploaded_file($file_tmp, 'image/'.$nama_gambar);
            header('location:product_list.php');
        }
    } 

?>


<div class="">
    <h2 class="text-center mt-5">Data Produk</h2>
    <form method="POST" action="" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" autofocus="" required="" placeholder="Nama produk" />
        </div>
        <div>
          <label>Kategori</label>
         <input type="text" name="kategori" placeholder="Kategori" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga" required="" placeholder="Harga" />
        </div>
        <div>
          <label>Stok</label>
         <input type="text" name="stok" required="" placeholder="Stok" />
        </div>
        <div>
          <label>Gambar Produk</label>
         <input type="file" name="gambar" required=""  placeholder="Gambar"/>
        </div>
        <div>
         <button type="submit" name="add">Tambah Produk</button>
        </div>
        </section>
      </form>

</div>



