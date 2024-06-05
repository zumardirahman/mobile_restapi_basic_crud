<?php
header("Content-Type: application/json");
include 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

// Mengambil semua produk dari database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Mengonversi hasil ke dalam bentuk array
$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
echo json_encode($products);

} else {
    echo json_encode(array("error" => "Invalid request method. Only GET method is allowed."));
}

$conn->close();