<!-- TOMBOL TAMBAH PRODUK -->
<a href="">
    <button type="submit" class="btn btn-secondary" style=" margin-top: 50px; ">
        <i class="fa-solid fa-plus"></i>
    </button>
</a>
<!-- TOMBOL TAMBAH PRODUK -->
<table class="table mt-4">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Username</td>
        <td>Role</td>
        <td>Aksi</td>
    </tr>
    
    <?php
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $no = 1;
    while ($row=$result->fetch_assoc()){
        
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row["nama"]?></td>
            <td><?php echo $row["username"]?></td>
            <td><?php echo $row["role"]?></td>
            <td>
                <a href="home.php?halaman=delete&id=<?php echo $row['id']?>"><button type="submit" class="btn btn-danger"  onclick="return confirm('Anda yakin mau menghapus ini?')">Delete</button></a>
                <a href="home.php?halaman=menu-edit&id=<?php echo $row['id']?>"><button class="btn btn-primary">Edit</button></a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>

