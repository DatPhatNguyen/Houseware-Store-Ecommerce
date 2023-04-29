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
    include_once "../utils/script.php";
    include_once "../utils/operator.php";
    include_once "partials/header.php"
    ?>
    <div class="main-content ">
        <h2 class="text-center text-uppercase" style="font-weight:900">Danh sách người dùng
        </h2>
        <p class="text-center text-secondary" style="font-size:13px">
            Có tất cả
            <?php
            $sql = "SELECT * FROM `tbl_users` ";
            $result = getTotalCount($sql);
            echo $result;
            ?>
            người dùng </p>

        <table class="table table-bordered table-striped text-center align-middle bg-light  mt-5 mb-3">
            <thead class="text-uppercase text-black lh-lg">
                <tr>
                    <th scope="col" class="p-2">ID người dùng</th>
                    <th scope="col" class="p-2">Tên đăng nhập</th>
                    <th scope="col" class="p-2">Ngày thêm</th>
                    <th scope="col" class="p-2">Xóa / Sửa</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT * FROM `tbl_users` ";
                $result = $conn->query($sql);
                // lay so hang trong database
                $numRows = $result->num_rows;
                $numberRowPerPage = 5; // moi trang chua 5 hang
                $totalPages = ceil($numRows / $numberRowPerPage); // tong so trang ( 15/5 = 3 trang)
                $page = $_GET['page'] ?? $_POST['page'] ??  $page = 1;
                $startingLimit = ($page - 1) * $numberRowPerPage;
                $sql = "SELECT * FROM `tbl_users` limit $startingLimit  ,  $numberRowPerPage";
                $users = renderMultipleRecord($sql);
                if (empty($users)) {
                    error_reporting(0);
                    ini_set('display_errors', 0);
                }
                foreach ($users as $user) {
                    echo
                    '<tr>
                            <td class="text-capitalize ">' . $user['id'] . '</td>
                            <td class="text-capitalize ">' . $user['username'] . '</td>
                            <td class="">' . $user['created_at'] . '</td>
                            </td>
                            <td style="max-width:120px"class=" ">
                                <button class="btn btn-danger btn-custom">
                                    <i class="fa-solid fa-trash"></i>
                                    <a href="delete_user.php?userid=' . $user['id'] . '"
                                        class="text-white text-decoration-none ms-1">Xóa</a>
                                </button>
                                <button class="btn btn-primary btn-custom ms-2">
                                    <i class="fa-solid fa-pencil "></i>
                                    <a href="update_user.php?userid=' . $user['id'] . '"
                                        class="text-white text-decoration-none ms-1">Sửa</a>
                                </button>
                            </td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
        // totalPages = ceil(tong so hang / so luong dong tren hang)
        // totalPages = ceil(15/5 = 3) -> tao 3 nut
        for ($btn = 1; $btn <= $totalPages; $btn++) {
            echo '
                    <button class="btn btn-danger mx-1 my-3">
                        <a class="text-white text-decoration-none" 
                        href="parentlist.php?page=' . $btn . '">' . $btn .
                '</a></a>
                    </button>
                    ';
        }
        ?>
    </div>
    <?php include_once "./partials/footer.php" ?>

</body>

</html>