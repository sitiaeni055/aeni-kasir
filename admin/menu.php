<!-- TOMBOL TAMBAH PRODUK -->
<a href="home.php?halaman=menu-add">
    <button type="submit" class="btn btn-secondary" style=" margin-top: 50px; ">
        <i class="fa-solid fa-plus"></i>Tambah Produk
    </button>
</a>
<!-- TOMBOL TAMBAH PRODUK -->
<table class="table mt-4">
    <tr>
        <td>No</td>
        <td>Nama Produk</td>
        <td>Kategori</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>Gambar</td>
        <td>Aksi</td>
    </tr>

    <?php
    $sql = "SELECT * FROM kategoris
    INNER JOIN menus
    ON kategoris.id = menus.kategori_id  ";
    $result = $conn->query($sql);
    $no = 1;
    while ($row=$result->fetch_assoc()){
        
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row["nama_menu"]?></td>
            <td><?php echo $row["nama"]?></td>
            <td><?php echo $row["harga"]?></td>
            <td><?php echo $row["stock"]?></td>
            <td><img width="70" src="../image/<?php echo $row["gambar"]?>" alt=""></td>
            <td>
                <a href="home.php?halaman=delete&id=<?php echo $row['id']?>"><button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus ini?')">Delete</button></a>
                <a href="home.php?halaman=menu-edit&id=<?php echo $row['id']?>"><button class="btn btn-primary">Edit</button></a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>

