<?php
if(isset($_POST['add'])){
    $nama_table = $_POST['table_nama'];
    $status = $_POST['status'];
    $add = $conn->query("INSERT INTO tables VALUE ('', '$nama_table', '$status')");

    if($add){
        header('location:home.php?halaman=meja');
    }
} 
?>
<h2 class="text-center mt-5 ">Tambah Meja</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <section class="base">
        <div class="my-4">
            <label>Nomor meja</label>
            <input type="text" class="form-control" name="table_nama" autofocus="" required="" />
        </div>
        <div class="my-4">
            <label>Status</label>
            <select name="status" id="" class="form-control">
            <?php $result = $conn->query("SELECT * FROM tables"); ?>
            <?php while($row = $result->fetch_assoc()) : ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['status'] ?></option>
            
            <?php endwhile; ?>
            </select>
        </div>
        <div class="my-4">
            <button type="submit" name="add" class="btn btn-light">Tambah</button>
        </div>
    </section>
</form>



