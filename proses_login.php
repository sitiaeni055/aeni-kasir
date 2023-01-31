<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$sql = "SELECT * FROM admin WHERE username='$username' and password=md5('$password')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:home.php");
  }
} else {
	header("location:index.php?pesan=gagal");
}
$conn->close();
?>


