<?php
include 'config.php'; 
$product_id = $_GET['id'];

$sql = "SELECT * FROM product WHERE product_id = $product_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['product_name']; ?></title>
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
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLLnOPDaZHmqXONcfOG5nNq0uHiEgDi7nrZSZiqvkyG8gFiYes');
            background-size: cover;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .product-detail {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-image {
            width: 100%;
            max-width: 300px;
            height: auto;
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .product-image:hover {
            transform: scale(1.1);
        }
        .order-btn {
            background-color: #333;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .order-btn:hover {
            background-color: #555;
            color: #ddd;
        }
        .product-name {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }
        .product-price {
            font-size: 1.75rem;
            color: #888;
            margin-bottom: 15px;
        }
        .product-qty {
            font-size: 1.25rem;
            color: #777;
            margin-bottom: 20px;
        }
        .quantity-input {
            width: 60px;
            text-align: center;
        }
        .delivery-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        .delivery-form label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            text-align: left;
            width: 100%;
        }
        .delivery-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        .delivery-form input:focus {
            outline: none;
            border-color: #555;
        }
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            justify-content: center;
            align-items: center;
        }
        .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Add box shadow for depth */
      opacity: 0.8; /* Adjust the value as needed */
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 10px;
    right: 10px;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
#order-message {
    font-size: 1.2rem; /* Increase font size for better readability */
    margin-bottom: 20px;
    color: #333; /* Change text color */
}

.home-btn {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.home-btn:hover {
    background-color: #555;
    color: #ddd;
}
        
    </style>
</head>
<body>
    <div class="container">
        <div class="product-detail">
            <img src="<?php echo isset($row['product_image']) ? $row['product_image'] : ''; ?>" alt="<?php echo isset($row['product_name']) ? $row['product_name'] : ''; ?>" class="product-image">
            <h1 class="product-name"><?php echo isset($row['product_name']) ? $row['product_name'] : ''; ?></h1>
            <p class="product-price">$<?php echo isset($row['product_price']) ? $row['product_price'] : ''; ?></p>
            <p class="product-qty">Quantity available: <?php echo isset($row['product_qty']) ? $row['product_qty'] : ''; ?></p>
            <form id="order-form">
                <input type="hidden" name="product_id" value="<?php echo isset($product_id) ? $product_id : ''; ?>">
                <input type="hidden" name="product_name" value="<?php echo isset($row['product_name']) ? $row['product_name'] : ''; ?>">
                <input type="hidden" name="product_price" value="<?php echo isset($row['product_price']) ? $row['product_price'] : ''; ?>">
                <input type="hidden" name="product_qty" value="<?php echo isset($row['product_qty']) ? $row['product_qty'] : ''; ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="quantity-input" value="1" min="1" max="<?php echo isset($row['product_qty']) ? $row['product_qty'] : ''; ?>">
                <div class="delivery-form">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <button type="submit" class="order-btn">Order Now</button>
            </form>
        </div>
    </div>
    <div id="order-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="order-message"></p>
            <button id="home-btn" class="home-btn">Go to Home</button>
        </div>
    </div>
    <script>
        document.getElementById('order-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = event.target;
            var formData = new FormData(form);

            fetch('process_order.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                showModal('Your order was successfully placed!');
                form.reset();
            })
            .catch(error => {
                showModal('There was an error placing your order. Please try again.');
            });
        });

        function showModal(message) {
            var modal = document.getElementById('order-modal');
            var messageElement = document.getElementById('order-message');
            messageElement.textContent = message;
            modal.style.display = 'flex';

            var closeButton = document.getElementsByClassName('close')[0];
            closeButton.onclick = function() {
                modal.style.display = 'none';
            }

            var homeButton = document.getElementById('home-btn');
            homeButton.onclick = function() {
                window.location.href = 'index.php'; // Change 'index.php' to your home page URL
            }
        }

        window.onclick = function(event) {
            var modal = document.getElementById('order-modal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
<?php
} else {
    echo "Product not found.";
}
$conn->close();
?>
