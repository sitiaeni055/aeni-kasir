<table class="table mt-5 w-50" style="background: #C3A0A0;">
    <tr>
        <td>Id</td>
        <td>Nama Pelanggan</td>
        <td>Meja</td>
        <td>Waiters</td>
        <td>Aksi</td>
    </tr>

    <?php
    $sql = "SELECT * FROM list_pelanggan";
    $result = $conn->query($sql);
    $no = 1;
    while ($row=$result->fetch_assoc()){
    ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $row["nama_pelanggan"]?></td>
        <td><?php echo $row["meja"]?></td>
        <td><?php echo $row["waiters"]?></td>
        <td>
            <a href=""><button type="submit" class="btn btn-success">Bayar</button></a>            
        </td>
    </tr>
    <?php
    }
    ?>
</table>