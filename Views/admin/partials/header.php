<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    header {
        box-shadow: 2px 4px 18px #000;
        padding: 24px 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-menu__item {
        text-decoration: none;
        font-size: 18px;
        display: inline-block;
        color: #000;
        font-weight: bold;
    }


    .admin-menu__item i {
        margin-right: 8px;
    }

    .admin-account {
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 30px;
    }
    </style>
</head>

<body>
    <header>
        <a class="admin-menu__item" href="../../../Houseware_Store/Views/admin/index.php"><i
                class="fa-solid fa-house"></i>Trang Chủ</a>
        <a class="admin-menu__item" href="../../../Houseware_Store/Views/admin/products-manage.php">
            <i class="fa-solid fa-store"></i>Quản Lý Sản Phẩm</a>
        <a class="admin-menu__item" href="../../../Houseware_Store/Views/admin/orders-manage.php">
            <i class="fa-solid fa-receipt"></i>Quản Lý Đơn Hàng</a>
        <a class="admin-menu__item" href="../../../Houseware_Store/Views/admin/users-manage.php">
            <i class="fa-solid fa-user"></i>
            Quản
            Lý Người
            Dùng</a>
        <div class="admin-account">
            <span class="d-inline-block">Hello <?php if (isset($_SESSION['admin'])) echo $_SESSION['admin'] ?></span>
            <a href="../../Views/admin/logout.php" class="text-decoration-none ">
                <button class="btn btn-outline-danger fw-bold">Đăng Xuất</button>
            </a>
        </div>

    </header>
</body>

</html>