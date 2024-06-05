<?php
header("Content-Type: application/json");
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
// Mendapatkan data dari permintaan HTTP PUT
$data = json_decode(file_get_contents("php://input"), true);

// Memperbarui produk di database
$id = $data['id'];
$name = $data['name'];
$description = $data['description'];
$price = $data['price'];

$sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "UPDATED successfully"));
} else {
    echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
}

} else {
    echo json_encode(array("error" => "Invalid request method. Only POST method is allowed."));
}

$conn->close();