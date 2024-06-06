<?php
header("Content-Type: application/json");
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari permintaan HTTP POST
    $data = json_decode(file_get_contents("php://input"), true);

    // Mendapatkan ID produk dari data POST
    $id = $data['id'];

    // Mengambil detail produk dari database berdasarkan ID
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        echo json_encode($product);
    } else {
        echo json_encode(array("message" => "Product not found"));
    }
} else {
    echo json_encode(array("error" => "Invalid request method. Only POST method is allowed."));
}

$conn->close();
?>