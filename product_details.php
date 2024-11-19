<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/product-details.css">
</head>
<body>
    <div class="container">
        <?php
        include 'config.php'; 
        if(isset($_GET['id'])) {
            $product_id = $_GET['id'];
            $sql = "SELECT * FROM product WHERE id = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="product-details">';
                echo '<img src="'. $row['product_image'] . '" alt="Product Image" class="product-image">';
                echo '<div class="product-info">';
                echo '<h2 class="product-name">' . $row['product_name'] . '</h2>';
                echo '<p class="product-price">$' . $row['product_price'] . '</p>';
                echo '<p class="product-qty">Quantity: ' . $row['product_qty'] . '</p>';
                echo '<p class="product-description">' . $row['product_description'] . '</p>';
                echo '<button class="buy-btn" onclick="window.location.href=\'purchase.php?id=' . $product_id . '\'">Buy Now</button>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "Product not found";
            }
            $conn->close();
        } else {
            echo "Product ID not provided";
        }
        ?>
    </div>
</body>
</html>
