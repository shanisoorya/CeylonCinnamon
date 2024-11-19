<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Analysis Chart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .chart-container {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

        .chart {
            width: 30%;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 10px;
        }

        .chart h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .chart .bar {
            height: 20px;
            background-color: #007bff;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .chart .label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .chart .value {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="chart-container">
        <div class="chart">
            <h2>Product Analysis</h2>
            <div class="bar" style="width: <?php echo ($product_count * 10) . '%'; ?>"></div>
            <div class="label">Total Products:</div>
            <div class="value"><?php echo $product_count; ?></div>
        </div>
        <div class="chart">
            <h2>Order Analysis</h2>
            <div class="bar" style="width: <?php echo ($order_count * 10) . '%'; ?>"></div>
            <div class="label">Total Orders:</div>
            <div class="value"><?php echo $order_count; ?></div>
        </div>
        <div class="chart">
            <h2>User Analysis</h2>
            <div class="bar" style="width: <?php echo ($user_count * 10) . '%'; ?>"></div>
            <div class="label">Total Users:</div>
            <div class="value"><?php echo $user_count; ?></div>
        </div>
    </div>
</body>

</html>
