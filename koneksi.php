<?php

    $conn = new mysqli("localhost", "root", "", "aeni_kasir");

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

?>