<?php
include 'config.php';

$success_message = ''; // Initialize the success message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $quantity = $_POST['quantity'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Insert order into database
    $sql = "INSERT INTO orders (product_id, product_name, product_price, product_qty, quantity, fullname, address, phone) 
            VALUES ('$product_id', '$product_name', '$product_price', '$product_qty', '$quantity', '$fullname', '$address', '$phone')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Order placed successfully.";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="css/tooplate-antique-cafe.css">
    <link rel="stylesheet" href="css/rr.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .message-container {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message-container">
            <?php 
            if (!empty($success_message)) {
                echo $success_message;
            } elseif (isset($error_message)) {
                echo $error_message;
            }
            ?>
            <br>
            <a href="index.php" class="btn">Go to Home</a>
        </div>
    </div>
</body>
</html>
