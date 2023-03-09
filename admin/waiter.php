
<a href="home.php?halaman=waiter-add">
    <button type="submit" class="btn btn-secondary" style=" margin-top: 50px; ">
        <i class="fa-solid fa-plus"></i>Tambah
    </button>
</a>

<style>
    .table {
        width: 50%;
        background: #F5EAEA;
    }
</style>
<table class="table mt-4">
    <tr>
        <td>No</td>
        <td>Nama Pelayan</td>
        <td>Aksi</td>
    </tr>

    <?php
    $sql = "SELECT * FROM pelayans";
    $result = $conn->query($sql);
    $no = 1;
    while ($row=$result->fetch_assoc()){
        
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row["pelayan_nama"]?></td>
            <td>
                <a href="home.php?id=<?php echo $row['id']?>&halaman=waiter-delete"><button type="submit" class="btn btn-danger"  onclick="return confirm('Anda yakin mau menghapus ini?')">Delete</button></a>
                <a href="home.php?id=<?php echo $row['id']?>&halaman=waiter-edit"><button class="btn btn-primary">Edit</button></a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>

