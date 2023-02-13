<a href="home.php?halaman=tambah_produk"><button type="submit" class="btn btn-secondary" style=" margin-top: 50px; "><i class="fa-solid fa-plus"></i>Tambah Produk</button></a>
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
    $sql = "SELECT * FROM masakan";
    $result = $conn->query($sql);
    $no = 1;
    while ($row=$result->fetch_assoc()){
        
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row["nama"]?></td>
            <td><?php echo $row["kategori"]?></td>
            <td><?php echo $row["harga"]?></td>
            <td><?php echo $row["stok"]?></td>
            <td><img width="70" src="../image/<?php echo $row["gambar"]?>" alt=""></td>
            <td>
                <a href="home.php?id=<?php echo $row['id']?>&halaman=delete"><button type="submit" class="btn btn-danger">Delete</button></a>
                <a href="home.php?id=<?php echo $row['id']?>&halaman=edit"><button type="submit" class="btn btn-primary">Edit</button></a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>

