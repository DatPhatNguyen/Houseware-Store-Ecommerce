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
    include_once "../utils/script.php";
    include_once "../utils/operator.php"
    ?>
    <div class="main-content">
        <h2 class="text-center text-uppercase" style="font-weight: 900">Danh Sách Sản Phẩm</h2>
        <p class="text-center text-secondary" style="font-size:13px">
            <?php
            $sql = "SELECT * FROM `tbl_products` ";
            $result = getTotalCount($sql);
            echo $result;
            ?>
            sản phẩm được tìm thấy</p>
        <a href="upload-product.php" class="text-decoration-none d-inline-block mt-4"><button class="btn btn-primary">Thêm Sản Phẩm
                Mới</button></a>
        <!-- Table  -->
        <table class="table table-bordered table-striped text-center align-middle bg-light my-5">
            <thead class="text-uppercase ">
                <tr>
                    <th scope="col" width="7%" class="p-3">ID</th>
                    <th scope="col" width="15%" class="p-3">Tên Sản Phẩm</th>
                    <th scope="col" width="10%" class="p-3">Số Lượng</th>
                    <th scope="col" width="8%" class="p-3">Giá</th>
                    <th scope="col" width="15%" class="p-3">Mô Tả</th>
                    <th scope="col" width="15%" class="p-3">Hình Ảnh</th>
                    <th scope="col" width="10%" class="p-3">Phân Loại</th>
                    <th scope="col" class="p-3">Xóa / Sửa</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT * FROM `tbl_products` ";
                $products = renderMultipleRecord($sql);
                if (empty($products)) {
                    error_reporting(0);
                    ini_set('display_errors', 0);
                }
                foreach ($products as $product) {
                    echo
                    '<tr>
                            <td class="p-3">' . $product['id'] . '</td>
                            <td class="p-3">' . $product['title'] . '</td>
                            <td class="p-3">' . $product['quantity'] . '</td>
                            <td class="p-3">' . $product['price'] . '</td>
                            <td class="p-3">' . $product['description'] . '</td>
                            <td class="p-3"><img src=' . $product['image'] . 'style="width:400px; height:400px;" alt=' . $product['title'] . '></td>
                            <td class="p-3">' . $product['category'] . '</td>
                              <td>
                                    <button class="btn btn-danger btn-custom">
                                        <i class="fa-solid fa-trash"></i>
                                        <a href="delete-product.php?productid=' . $product['id'] . '"
                                            class="text-white text-decoration-none ms-1">Xóa</a>
                                    </button>
                                    <button class="btn btn-primary btn-custom ms-2">
                                        <i class="fa-solid fa-pencil "></i>
                                        <a href="update-product.php?productid=' . $product['id'] . '"
                                            class="text-white text-decoration-none ms-1">Sửa</a>
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


</html>