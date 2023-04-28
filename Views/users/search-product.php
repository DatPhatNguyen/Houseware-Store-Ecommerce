<?php
session_start();
include_once "../utils/operator.php";
include_once "../utils/script.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- search student first -->
    <header class="header" id="header" style="background:#fff;">
        <div class="container-fluid mx-auto shadow header-container" id="top">
            <div class=" d-flex justify-content-between  align-items-center mx-5">
                <!-- index logo -->
                <div>
                    <a href='index.php'>
                        <img src='../template/images/logo-ctu.png' class='d-inline-block' style='width:60px; height:auto;'>
                    </a>
                    <a href="index.php" class="text-capitalize text-success text-decoration-none active ms-3">Trang
                        chủ</a>
                </div>
                <!-- header / navigate   -->
                <?php echo isset($_SESSION['parent'])
                    ?
                    '<div class="pt-1 mt-1">
                    <p class="me-3" style="font-weight:700; font-size:18px; display:inline-block">' . $_SESSION['parent'] . '</p>
                    <button type="submit" class=" border btn btn-danger py-2 px-4 text-center ">
                        <a href="../pages/logout.php" class="text-white text-decoration-none text-capitalize text-button">Đăng xuất</a>
                    </button>
                </div>'
                    : ' <div class="pt-1">
                                <button type="submit" class=" border btn btn-danger py-2 px-4 text-center ms-3 ">
                    <a href="signin.php" class="text-white text-decoration-none text-capitalize text-button">Đăng
                        nhập</a>    
                </button>
            </div>';
                ?>
            </div>
        </div>
    </header>
    <?php
    include_once "./partials/header.php"
    ?>
    <div class="p-5" id="content">
        <form method="POST" class="mt-5">
            <div class="form-group">
                <label for="" class="form-label fw-bold mb-3" style="font-size:16px;">Tìm kiếm sản phẩm: </label>
                <input type="text" placeholder="Nhập tên sản phẩm" class="w-50 form-control p-2" name="student-search">
                <a href="search-product.php">
                    <button class="my-3 btn btn-primary px-3 pt-2 text-center" name="search" type="submit">Tìm sản
                        phẩm</button>
                </a>
                <p class="text-danger"><?php echo isset($error) ? $error : "" ?></p>
            </div>
            <hr>
        </form>
        <!-- search score after -->
        <h3 class="my-5 text-center text-uppercase" style="font-weight:900">Thông tin sản phẩm</h3>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['student-product'];
            $sql = "SELECT * FROM `tbl_products` WHERE title like '%$search%' OR category like '%$search%'";
            $products = renderMultipleRecord($sql);
            if ($search === '') {
                echo '<script type="text/javascript">
                            window.alert("Bạn phải nhập tên sản phẩm !!");
                            window.location.href="search-product.php"
                            </script>';
            }
            if (empty($students)) {
                echo '<script type="text/javascript">
                            window.alert("Không tìm thấy sản phẩm!!");
                            window.location.href="search-product.php"
                            </script>';
            }
            foreach ($students as $student) {
                echo '';
            }
        }
        ?>
        </table>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("input").focus();
    })
</script>

</html>