<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .main-content {
            margin: 32px auto 0 auto;
            padding: 50px;
            max-width: 1280px;
        }
    </style>
</head>

<body>
    <?php
    include_once "./partials/header.php";
    include_once "../utils/operator.php"
    ?>
    <div class="main-content">
        <h2 class="text-center" style="font-weight: 900">Quản Lý Đơn Hàng</h2>
        <table class="table table-bordered table-striped text-center align-middle bg-light my-5">
            <thead class="text-uppercase ">
                <tr>
                    <th scope="col" class="p-3">ID Đơn Hàng</th>
                    <th scope="col" class="p-3">Tên Người Đặt</th>
                    <th scope="col" class="p-3">Ngày Đặt</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT * FROM `tbl_orders` ";
                $orders = renderMultipleRecord($sql);
                if (empty($orders)) {
                    error_reporting(0);
                    ini_set('display_errors', 0);
                }
                foreach ($orders as $order) {
                    echo
                    '<tr>
                            <td >' . $order['id'] . '</td>
                            <td class="p-3">' . $order['image'] . '</td>
                            <td class="p-3">' . $order['category_id'] . '</td>
                              <td>
                                    <button class="btn btn-danger btn-custom">
                                        <a href="detail-order.php?orderid=' . $order['id'] . '"
                                            class="text-white text-decoration-none ms-1">Xem Chi Tiết</a>
                                    </button>
                                </td>
                        </tr>';
                }
                // admin's pagination
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once "./partials/footer.php" ?>

</body>
<?php include_once "../../Constants.php" ?>

</html>