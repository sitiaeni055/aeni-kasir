

<a href="produk_add_form.php"><button>Tambah Produk</button></a>
<table class="table">
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
            <td><img width="70" src="image/<?php echo $data["gambar"]?>" alt=""></td>
            <td>
                <a href="produk_delete.php?id=<?php echo $data['id']?>">Delete</a>
                <a href="produk_edit_form.php?id=<?php echo $data['id']?>">Edit</a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>