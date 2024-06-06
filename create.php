<?php
header("Content-Type: application/json");
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Mendapatkan data dari permintaan HTTP POST
                $data = json_decode(file_get_contents("php://input"), true);

                // Menambah produk baru ke database
                $name           = $data['name'];
                $description    = $data['description'];
                $price          = $data['price'];

                $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
                
                if ($conn->query($sql) === TRUE) {
                    echo json_encode(array("message" => "CREATED successfully"));
                } else {
                    echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
                }

} else {
    echo json_encode(array("error" => "Invalid request method. Only POST method is allowed."));
}

$conn->close();