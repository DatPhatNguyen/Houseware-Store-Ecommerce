<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .statistic-title {
            margin: 60px 0 0 32px;
            font-weight: 900;
        }

        .dashboard-container {
            display: flex;
            align-items: center;
            gap: 25px;
            padding: 50px;
            max-width: 1280px;
        }

        .dashboard-item {
            flex-basis: 33%;
            border-radius: 16px;
            padding: 16px 32px;
            background: #f1f1f1;
        }

        .dashboard-item span {
            display: inline-block;
            font-size: 20px;
            font-weight: 900;
            text-transform: capitalize;
        }

        .dashboard-item p {
            font-size: 14px;
            color: grey;
        }
    </style>
</head>

<body>
    <?php include_once "../utils/operator.php" ?>
    <h2 class="statistic-title text-center">Bảng Thống Kê</h2>
    <div class="dashboard-container">
        <div class="dashboard-item">
            <span class="dashboard-item__product">Tổng số sản phẩm </span>
            <p class="dashboard-item__product-quantity mt-2">
                Có tất cả <?php
                            $sql = "SELECT * FROM `tbl_products`";
                            $totalProduct = getTotalCount($sql);
                            echo $totalProduct;
                            ?>
                sản phẩm
            </p>
        </div>
        <div class="dashboard-item">
            <span class="dashboard-item__product">Doanh thu </span>
            <p class="dashboard-item__product-quantity mt-2"> Có tất cả <?php
                                                                        $sql = "SELECT * FROM `tbl_products`";
                                                                        $totalProduct = getTotalCount($sql);
                                                                        echo $totalProduct;
                                                                        ?>
                sản phẩm</p>
        </div>
        <div class="dashboard-item">
            <span class="dashboard-item__product">Só lượng người dùng truy cập </span>
            <p class="dashboard-item__product-quantity"> Có tất cả <?php
                                                                    $sql = "SELECT * FROM `tbl_users`";
                                                                    $totalProduct = getTotalCount($sql);
                                                                    echo $totalProduct;
                                                                    ?>
                sản phẩm</p>
        </div>

    </div>
</body>
<?php include_once "../utils/script.php" ?>

</html>