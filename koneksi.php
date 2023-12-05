<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "tugas_pronet_2";

// Create connection
$conn = mysqli_connect($server, $user, $password) or die(mysqli_error($koneksi));

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>