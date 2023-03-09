
<a href="home.php?halaman=meja-add">
    <button type="submit" class="btn btn-secondary" style=" margin-top: 50px; ">
        <i class="fa-solid fa-plus"></i>Tambah
    </button>
</a>

<style>
    .table {
        width: 40%;
        background: #F5EAEA;
    }
</style>
<table class="table mt-4">
    <tr>
        <td>No</td>
        <td>Nama Meja</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>

    <?php
    $sql = "SELECT * FROM tables";
    $result = $conn->query($sql);
    $no = 1;
    while ($row=$result->fetch_assoc()){
        
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row["table_nama"]?></td>
            <td><?php echo $row["status"]?></td>
            <td>
                <a href="home.php?id=<?php echo $row['id']?>&halaman=meja-delete"><button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus ini?')">Delete</button></a>
                <a href="home.php?id=<?php echo $row['id']?>&halaman=meja-edit"><button class="btn btn-primary">Edit</button></a>
            
            </td>
        </tr>
    <?php
    }
    ?>
</table>

