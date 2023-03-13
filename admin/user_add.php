<?php
if(isset($_POST['add'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $add = $conn->query("INSERT INTO users VALUE ('', '$nama', '$username', md5('$password'), '$role')");

    if($add){
        header('location:home.php?halaman=user');
    }
} 
?>
<h2 class="text-center mt-5 ">Tambah</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <section class="base">
        <div class="my-4">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" autofocus="" required="" />
        </div>
        <div class="my-4">
            <label>Username</label>
            <input type="text" class="form-control" name="username" autofocus="" required="" />
        </div>
        <div class="my-4">
            <label>Password</label>
            <input type="text" class="form-control" name="password" autofocus="" required="" />
        </div>
        <div class="my-4">
            <label>Role</label>
            <select name="role" id="" class="form-control">
            <option selected></option>
            <option value="1">admin</option>
            <option value="2">kasir</option>
            </select>
        </div>
        <div class="my-4">
            <button type="submit" name="add" class="btn btn-light">Tambah</button>
        </div>
    </section>
</form>

