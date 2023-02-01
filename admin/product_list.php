<a href="home.php?halaman=tambah_produk"><button type="submit" class="btn btn-secondary" style=" margin-top: 48px; ">Tambah Produk</button></a>
<table class="table mt-4">
    <tr>
        <td>Id</td>
        <td>Nama Produk</td>
        <td>Kategori</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>Gambar</td>
        <td>Aksi</td>
    </tr>

    <?php
    $query = "SELECT * FROM masakan";
    $select = $conn->query($query);
    $no = 1;
    while ($data = mysqli_fetch_array($select)){
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data["nama"]?></td>
            <td><?php echo $data["kategori"]?></td>
            <td><?php echo $data["harga"]?></td>
            <td><?php echo $data["stok"]?></td>
            <td><img width="70" src="../image/<?php echo $data["gambar"]?>" alt=""></td>
            <td>
                <a href="home.php?id=<?php echo $data['id']?>&halaman=delete"><button type="submit" class="btn btn-primary">Delete</button></a>
                <a href="home.php?id=<?php echo $data['id']?>&halaman=edit"><button type="submit" class="btn btn-danger">Edit</button></a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>

