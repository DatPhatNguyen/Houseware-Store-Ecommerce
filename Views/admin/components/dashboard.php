<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .statistic-title {
            margin-top: 2rem;
            margin-left: 2rem;
        }

        .dashboard-container {
            display: flex;
            align-items: center;
            gap: 25px;
            padding: 16px 32px;
        }

        .dashboard-item {
            flex-basis: 25%;
            border-radius: 16px;
            padding: 16px 24px;
            background: #f1f1f1;
        }

        .dashboard-item span {
            display: inline-block;
            font-size: 18px;
        }

        .dashboard-item p {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3 class="statistic-title">Statistic</h3>
    <div class="dashboard-container">
        <div class="dashboard-item">
            <span class="dashboard-item__product-total">Tổng số sản phẩm </span>
            <p class="dashboard-item__product-quantity">Số lượng: </p>
        </div>
        <div class="dashboard-item">
            <span class="dashboard-item__product-total">Tổng số sản phẩm </span>
            <p class="dashboard-item__product-quantity">Số lượng: </p>
        </div>
        <div class="dashboard-item">
            <span class="dashboard-item__product-total">Tổng số sản phẩm </span>
            <p class="dashboard-item__product-quantity">Số lượng: </p>
        </div>
        <div class="dashboard-item">
            <span class="dashboard-item__product-total">Tổng số sản phẩm </span>
            <p class="dashboard-item__product-quantity">Số lượng: </p>
        </div>
    </div>
</body>

</html>