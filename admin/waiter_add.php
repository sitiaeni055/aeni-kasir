<?php
if(isset($_POST['add'])){
    $nama_pelayan = $_POST['pelayan_nama'];
    $add = $conn->query("INSERT INTO pelayans VALUE ('', '$nama_pelayan')");

    if($add){
        header('location:home.php?halaman=waiter');
    }
} 
?>
<h2 class="text-center mt-5 ">Tambah Waiters</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <section class="base">
        <div class="my-4">
            <label>Nama Waiters</label>
            <input type="text" class="form-control" name="pelayan_nama" autofocus="" required="" />
        </div>
        <div class="my-4">
            <button type="submit" name="add" class="btn btn-light">Tambah</button>
        </div>
    </section>
</form>



