<?php
include "bot.php";
?>


<div class="login">
    <h2 class="text-center mt-5">Halo, Selamat Pagi!</h2>
    <div class="container col-4 mt-5 a p-3 ">
            
            <form action="proses_login.php" method="post">
            <div class="mb-3 b">
                <label for="exampleInputEmail1" class="form-label m-2">Username</label>
                <input type="text" class="form-control " id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 b">
                <label for="exampleInputPassword1" class="form-label m-2">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-light mt-3">Submit</button>
            </form>
    </div>
</div>
