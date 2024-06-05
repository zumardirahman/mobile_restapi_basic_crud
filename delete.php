<?php
header("Content-Type: application/json");
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari permintaan HTTP POST
    $data = json_decode(file_get_contents("php://input"), true);

    // Jika data "id" tersedia dalam permintaan POST, maka lanjutkan dengan penghapusan
    if(isset($data['id'])) {
        // Mendapatkan ID produk dari data POST
        $id = $data['id'];

        // Menghapus produk dari database
        $sql = "DELETE FROM products WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array("message" => "DELETED successfully"));
        } else {
            echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
        }
    } else {
        echo json_encode(array("error" => "Missing 'id' parameter in POST request."));
    }
} else {
    echo json_encode(array("error" => "Invalid request method. Only POST method is allowed."));
}

$conn->close();
?>
