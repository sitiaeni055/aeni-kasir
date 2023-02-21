<?php

session_destroy();
header("location:login.php?pesan=logout");

?>