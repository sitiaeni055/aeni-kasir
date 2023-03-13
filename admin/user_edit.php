<?php
    include "../koneksi.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $edit = $conn->query($sql);
?>

<?php
    while($row=$edit->fetch_assoc()){
?>
<div class="edit mt-5">
<form method="post" action="" enctype="multipart/form-data" >
      <section class="base">
        <div class="my-4">
          <label>No</label>
          <input type="text" class="form-control" name="id" autofocus="" required="" value="<?php echo $row['id'];?>"/>
        </div>
        <div class="my-4">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama" autofocus="" required="" value="<?php echo $row['nama']?>"/>
        </div>
        <div class="my-4">
          <label>Username</label>
          <input type="text" class="form-control" name="username" autofocus="" required="" value="<?php echo $row['username']?>"/>
        </div>
        <div class="my-4">
          <label>Password</label>
          <input type="text" class="form-control" name="password" autofocus="" required=""/>
        </div>
        <div class="my-4">
        <label>Role</label>
            <select name="role" id="" class="form-control">
            <option selected></option>
            <option value="1">admin</option>
            <option value="2">kasir</option>
            </select>
        </div>
        <button type="submit" name="edit" class="btn btn-light">Simpan</button>
        </section>
    </form>
</div>
   
<?php
    } 
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $update = $conn->query("UPDATE users SET nama='$nama', username='$username', password=md5('$password'), role='$role' WHERE id='$id'");
        if($update){
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Berhasil diupdate');
                window.location.href='home.php?halaman=user';
                </script>"); 
        }
    } 
?>
    </form>