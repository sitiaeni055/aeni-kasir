<?php
 include "../koneksi.php";
?>
<?php


    if(isset($_POST['add'])){
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $meja = $_POST['meja'];
        $waiters = $_POST['waiters'];
        $add = $conn->query("INSERT INTO list_pelanggan VALUE ('', '$nama_pelanggan', '$meja', '$waiters')");

        if($add){
            header('location:home.php?halaman=list-pelanggan');
        }
    } 

?>

<form action="" method="post" class="mt-5">
    <h2 class="text-center">Input Pelanggan</h2>  
    <section class="base">
        <div class="my-4">
          <label>Nama Pelanggan</label>
          <input type="text" name="nama_pelanggan" autofocus="" required="" />
        </div>  
        <div class="my-4">
            <h6>Meja</h6>
            <div class="col-4 d-inline-block">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 2</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 4</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 5</label>
            </div>
            </div>
            <div class="col-4 d-inline-block">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 6</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 7</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 8</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 9</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meja" id="flexRadioDefault1" value="meja 1">
                <label for="">Meja 10</label>
            </div>
            </div>
        </div>  
        <div class="my-4">
          <label>Nama Waiters</label>
          <input type="text" name="waiters" autofocus="" required="" style="margin-left: 5%;"/>
        </div>
        <div class="my-4">
         <button type="submit" name="add" class="btn btn-light">Kirim</button>
        </div>
    </section>  
</form>