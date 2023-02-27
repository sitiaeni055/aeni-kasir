
<?php
    include "../koneksi.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM tables WHERE id='$id'";
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
          <label>Nama meja</label>
          <input type="text" class="form-control" name="pelayan_nama" autofocus="" required="" value="<?php echo $row['table_nama']?>"/>
        </div>
        <button type="submit" name="edit" class="btn btn-light">Edit</button>
        </section>
    </form>
</div>
   
<?php
    } 
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $nama_table = $_POST['table_nama'];
        $status = $_POST['status'];
        $update = $conn->query("UPDATE tables SET table_nama='$nama_table', status='$status' WHERE id='$id'");
        if($update){
            header('location:home.php?halaman=meja');
        }
    } 
?>
    </form>