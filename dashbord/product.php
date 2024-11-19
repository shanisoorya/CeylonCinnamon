<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
        th, td {
            padding: 15px;
        }
        .update-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .update-btn {
            background-color: #b67533;
            color: white;
        }
        .update-btn:hover {
            background-color: #45a049;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
        .delete-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Ceylone Cinnamon</h1>
        </div>
        <ul>
            <li><a href="index.php"><img src="dashboard (2).png" alt="">&nbsp; <span>Dashboard</span> </li>
            <li><a href="product.php"><img src="reading-book (1).png" alt="">&nbsp;<span>Product</span> </a></li>
            <li><a href="admin_orders.php"><img src="teacher2.png" alt="">&nbsp;<span>Orders</span> </li>
            <li><a href="admin_panel.php"><img src="school.png" alt="">&nbsp;<span>Users</span> </a></li>
            <li><a href="admin_register.php"><img src="school.png" alt="">&nbsp;<span>Admin Register</span> </a></li>
            <li><a href="../login.php"><img src="settings.png" alt="">&nbsp;<span>Logout</span> </a></li>
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
            <br><br>
            <h1 text align="center">Add New Product</h1><br>

            <form action="add_product.php" method="POST" enctype="multipart/form-data" style="width: 50%; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <label for="product_name" style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1em; color: #333;">Product name:</label>
                <input type="text" id="product_name" name="product_name" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 1em; background-color: #fff;"><br><br>

                <label for="product_price" style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1em; color: #333;">Product price:</label>
                <input type="text" id="product_price" name="product_price" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 1em; background-color: #fff;"><br><br>

                <label for="product_qty" style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1em; color: #333;">Product Qty:</label>
                <input type="text" id="product_qty" name="product_qty" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 1em; background-color: #fff;"><br><br>

                <label for="product_image" style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1em; color: #333;">Product image:</label>
                <input type="file" id="product_image" name="product_image" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 1em; background-color: #fff;"><br><br>

                <input type="submit" style="width: 100%; padding: 10px 20px; border: none; border-radius: 5px; background-color: #b67533; color: white; font-size: 1.2em; cursor: pointer; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#CC9966'" onmouseout="this.style.backgroundColor='#b67533'">
            </form>

            <br>
            <div>
                <div class="content-2">
                    <div class="recent-payments">
                        <div class="title">
                            <h2>Recent Products</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <div class="table-container">
                            <table style="width:100%" class="content-2">
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Qty</th>
                                    <th>Product Image</th>
                                    <th>Actions</th>
                                </tr>
                                <?php
                                include 'conn.php';

                                // Delete product
                                if (isset($_GET['delete_id'])) {
                                    $delete_id = $_GET['delete_id'];
                                    $sql = "DELETE FROM product WHERE product_id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $delete_id);
                                    if ($stmt->execute()) {
                                        echo "<script>alert('Product deleted successfully');</script>";
                                        echo "<script>window.location.href='product.php';</script>";
                                    } else {
                                        echo "<script>alert('Error deleting product');</script>";
                                    }
                                }

                                // Update product
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
                                    $product_id = $_POST['product_id'];
                                    $product_name = $_POST['product_name'];
                                    $product_price = $_POST['product_price'];
                                    $product_qty = $_POST['product_qty'];

                                    $sql = "UPDATE product SET product_name = ?, product_price = ?, product_qty = ? WHERE product_id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("sdii", $product_name, $product_price, $product_qty, $product_id);
                                    $stmt->execute();

                                    if ($stmt->affected_rows > 0) {
                                        echo "<script>alert('Product updated successfully');</script>";
                                        echo "<script>window.location.href='product.php';</script>";
                                    } else {
                                        echo "<script>alert('Error updating product');</script>";
                                    }
                                }

                                // Fetch and display products
                                $sql = "SELECT * FROM product";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                                <td>' . $row["product_id"] . '</td>
                                                <td>' . htmlspecialchars($row["product_name"]) . '</td>
                                                <td>' . htmlspecialchars($row["product_price"]) . '</td>
                                                <td>' . htmlspecialchars($row["product_qty"]) . '</td>
                                                <td><img src="' . htmlspecialchars($row["product_image"]) . '" alt="' . htmlspecialchars($row["product_name"]) . '" style="width: 50px; height: auto;"></td>
                                                <td>
                                                    <form method="post" action="product.php" style="display:inline-block;">
                                                        <input type="hidden" name="product_id" value="' . htmlspecialchars($row["product_id"]) . '">
                                                        <input type="text" name="product_name" value="' . htmlspecialchars($row["product_name"]) . '" required>
                                                        <input type="text" name="product_price" value="' . htmlspecialchars($row["product_price"]) . '" required>
                                                        <input type="text" name="product_qty" value="' . htmlspecialchars($row["product_qty"]) . '" required>
                                                        <button type="submit" name="update_product" class="update-btn">Update</button>
                                                    </form>
                                                    <form method="get" action="product.php" style="display:inline-block;">
                                                        <input type="hidden" name="delete_id" value="' . htmlspecialchars($row["product_id"]) . '">
                                                        <button type="submit" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button>
                                                    </form>
                                                </td>
                                              </tr>';
                                    }
                                } else {
                                    echo "<p>0 results</p>";
                                }

                                $conn->close();
                                
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
