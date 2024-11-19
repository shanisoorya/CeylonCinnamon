<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shani";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product count
$product_count_sql = "SELECT COUNT(*) as product_count FROM product";
$product_count_result = $conn->query($product_count_sql);
$product_count = 0;

if ($product_count_result->num_rows > 0) {
    $product_count_row = $product_count_result->fetch_assoc();
    $product_count = $product_count_row['product_count'];
}

// Get order count
$order_count_sql = "SELECT COUNT(*) as order_count FROM orders";
$order_count_result = $conn->query($order_count_sql);
$order_count = 0;

if ($order_count_result->num_rows > 0) {
    $order_count_row = $order_count_result->fetch_assoc();
    $order_count = $order_count_row['order_count'];
}

// Get message count
$message_count_sql = "SELECT COUNT(*) as message_count FROM submissions";
$message_count_result = $conn->query($message_count_sql);
$message_count = 0;

if ($message_count_result->num_rows > 0) {
    $message_count_row = $message_count_result->fetch_assoc();
    $message_count = $message_count_row['message_count'];
}

// Handle product insertion
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
    $target_file = basename($_FILES["product_image"]["name"]);
    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        $uploaded_image_path = $target_file;
    } else {
        die("Error uploading the image.");
    }

    // Use prepared statements to insert data into the products table
    $stmt = $conn->prepare("INSERT INTO product (product_name, product_price, product_qty, product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $product_name, $product_price, $product_qty, $uploaded_image_path);

    if ($stmt->execute()) {
        // Record created successfully, redirect to product.php
        header("Location: product.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Count registered users with user type "user"
$user_count_sql = "SELECT COUNT(*) as user_count FROM users WHERE user_type = 'user'";
$user_count_result = $conn->query($user_count_sql);
$user_count = 0;

if ($user_count_result->num_rows > 0) {
    $user_count_row = $user_count_result->fetch_assoc();
    $user_count = $user_count_row['user_count'];
}

// Count registered users with user type "admin"
$admin_count_sql = "SELECT COUNT(*) as admin_count FROM users WHERE user_type = 'admin'";
$admin_count_result = $conn->query($admin_count_sql);
$admin_count = 0;

if ($admin_count_result->num_rows > 0) {
    $admin_count_row = $admin_count_result->fetch_assoc();
    $admin_count = $admin_count_row['admin_count'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .side-menu {
            position: fixed;
            background: #b67533;
            width: 20vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .side-menu .brand-name {
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .side-menu li {
            font-size: 24px;
            padding: 10px 40px;
            color: white;
            display: flex;
            align-items: center;
        }
        .side-menu li:hover {
            background: white;
            color: #f05462;
        }
        .container {
            position: absolute;
            right: 0;
            width: 80vw;
            height: 100vh;
            background: #f1f1f1;
        }
        .container .header {
            position: fixed;
            top: 0;
            right: 0;
            width: 80vw;
            height: 10vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .container .header .nav {
            width: 90%;
            display: flex;
            align-items: center;
        }
        .container .header .nav .search {
            flex: 3;
            display: flex;
            justify-content: center;
        }
        .container .header .nav .search input[type=text] {
            border: none;
            background: #f1f1f1;
            padding: 10px;
            width: 50%;
        }
        .container .header .nav .search button {
            width: 40px;
            height: 40px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container .header .nav .user {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container .header .nav .user img {
            width: 40px;
            height: 40px;
        }
        .container .header .nav .user .img-case {
            position: relative;
            width: 50px;
            height: 50px;
        }
        .container .header .nav .user .img-case img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .cards {
            display: flex;
            justify-content: space-around;
            margin-top: 12vh;
        }
        .card {
            background: white;
            width: 20vw;
            height: 20vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 10px;
        }
        .card .box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card .box h1 {
            margin: 0;
            font-size: 36px;
        }
        .card .box h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .card .icon-case img {
            width: 50px;
            height: 50px;
        }
        .chart-container {
            width: 100%;
            max-width: 800px; /* Adjust max-width for larger chart */
            height: 400px; /* Set a fixed height for the chart */
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
    </style>
    <!-- Add Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Ceylone Cinnamon</h1>
        </div>
        <ul>
            <li><img src="dashboard (2).png" alt="">&nbsp; <span>Dashboard</span> </li>
            <li><a href="product.php"><img src="reading-book (1).png" alt="">&nbsp;<span>Product</span> </a></li>
            <li><a href="admin_orders.php"><img src="teacher2.png" alt="">&nbsp;<span>Orders</span> </a></li>
            <li><a href="admin_panel.php"><img src="school.png" alt="">&nbsp;<span>Users</span> </a></li>
            <li><a href="admin_register.php"><img src="school.png" alt="">&nbsp;<span>Admin Register</span> </a></li>
            <li><a href="../login.php"><img src="settings.png" alt="">&nbsp;<span>Logout</span> </a></li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="search.png" alt=""></button>
                </div>
                <div class="user">
                    <a href="#" class="btn">Add New</a>
                    <img src="notifications.png" alt="">
                    <div class="img-case">
                        <img src="user.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo $product_count; ?></h1>
                        <h3>Products</h3>
                    </div>
                    <div class="icon-case">
                        <img src="product.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $order_count; ?></h1>
                        <h3>Orders</h3>
                    </div>
                    <div class="icon-case">
                        <img src="order.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $user_count; ?></h1>
                        <h3>Users</h3>
                    </div>
                    <div class="icon-case">
                        <img src="us.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $admin_count; ?></h1>
                        <h3>Admin</h3>
                    </div>
                    <div class="icon-case">
                        <img src="ad.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $message_count; ?></h1>
                        <h3>Messages</h3>
                    </div>
                    <div class="icon-case">
                        <img src="kl.png" alt="">
                    </div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="myChart" width="800" height="400"></canvas> <!-- Adjust width and height for larger chart -->
            </div>
        </div>
    </div>
    <script>
        // Chart.js script
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Products', 'Orders', 'Users', 'Admin', 'Messages'],
                datasets: [{
                    label: 'Ceylone Cinnamon Analyse',
                    data: [<?php echo $product_count; ?>, <?php echo $order_count; ?>, <?php echo $user_count; ?>, <?php echo $admin_count; ?>, <?php echo $message_count; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
