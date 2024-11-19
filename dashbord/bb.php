<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $product_image = $_FILES['product_image']['name'];

    // Validate inputs
    if (!is_numeric($product_price) || !is_numeric($product_qty)) {
        die("Invalid input: Price and quantity must be numeric.");
    }

    // Image upload handling
    $target_dir = "";
    if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0777, true)) {
            die("Failed to create directories...");
        }
    }
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        $uploaded_image_path = $target_file;
    } else {
        die("Error uploading the image.");
    }

    // Use prepared statements to insert data into the products table
    $stmt = $conn->prepare("INSERT INTO product (product_name, product_price, product_qty, product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $product_name, $product_price, $product_qty, $uploaded_image_path);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
