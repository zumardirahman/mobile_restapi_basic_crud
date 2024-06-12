<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-type:application/json;charset=utf-8"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$host = "localhost"; // Ganti dengan host Anda
$username = "root"; // Ganti dengan username database Anda
$password = "toor"; // Ganti dengan password database Anda
$database = "data_toko"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Check koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}else{
    // echo "Koneksi berhasil";
}
?>
