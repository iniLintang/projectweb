<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "19387571160-4_Daven Al Khalwarizmy"; // Adjusted name if needed

// Establish connection
$db = mysqli_connect($server, $user, $password, $nama_database);

// Check connection
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
