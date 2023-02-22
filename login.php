<?php
include "bot.php";
?>


<div class="login">
    <h2 class="text-center mt-5">Halo, Selamat Pagi!</h2>
    <div class="container col-4 mt-5 a p-3" style="background: #c3a0a0;">

            <!-- PESAN ERROR LOGIN DAN LOGOUT -->
             <?php if(isset($_GET["pesan"])) : ?>
                <?php if($_GET['pesan'] == "gagal")  : ?>
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                        <strong>Maaf Username dan passwor anda salah !!</strong>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                        <strong>Anda telah berhasil logout</strong>
                    </div>
                <?php endif ?>
            <?php endif ?>
            <!-- PESAN ERROR LOGIN DAN LOGOUT -->

            <form action="proses_login.php" method="post">
            <div class="mb-3 b">
                <label for="exampleInputEmail1" class="form-label m-2">Username</label>
                <input type="text" class="form-control i" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 b">
                <label for="exampleInputPassword1" class="form-label m-2">Password</label>
                <input type="password" class="form-control i" id="exampleInputPassword1" name="password" required>
            </div>
            <button type="submit" class="btn btn-light mt-3">Submit</button>
            </form>
    </div>
</div>


		