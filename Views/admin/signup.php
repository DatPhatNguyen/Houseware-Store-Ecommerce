<?php
include_once "../utils/operator.php";
include_once "../utils/script.php";
$errors = [];
$check = false;
define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
define('REQUIRE_PASSWORD_LENGTH', 'Mật khẩu phải lớn hơn 6 kí tự');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = validData($_POST['admin_name']);
    $password = validData($_POST['password']);
    // $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $hash_password = md5($password);
    $check = false;
    if (empty($name) || empty($hash_password)) {
        $errors['admin_name'] = $errors['password'] = REQUIRE_FIELD_ERROR;
        $check = false;
    } else {
        $sql = "SELECT * FROM `tbl_admin` WHERE `admin_name` = '$name' AND `password` = '$hash_password'";
        $query = $conn->query($sql);
        if (mysqli_num_rows($query) > 0) {
            echo "<script language='javascript' type='text/javascript'>
                 window.alert('Tài khoản quản lý đã tồn tại!!')
                 window.location.href='signup.php'
                </script>";
            $check = false;
        } else {
            $sql = "INSERT INTO `tbl_admin` (admin_name,password) VALUES ('$name', '$hash_password')";
            $result = $conn->query($sql);
            if ($result) {
                echo "<script language='javascript' type='text/javascript'>
                 window.alert('Thêm mới admin thành công!!')
                 window.location.href ='login.php'
                     </script>";
                $check = true;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới admin</title>
    <style>
    #choose-typeuser {
        margin: 40px 0 0 40px;
    }
    </style>
</head>

<body>
    <?php include_once "./partials/header.php" ?>
    <a href="../type-user.php" class="text-decoration-none">
        <button class="btn btn-primary " id="choose-typeuser">Chọn loại người dùng</button>
    </a>
    <div class="row mx-auto shadow" style="max-width:60%;border-radius:30px; background:#fff; margin: 60px 0 70px 0 ;">
        <div class="col-sm-6 col-lg-6">
            <img src="../../../public/images/admin-signup.jpg" class="my-3"
                style="object-position:center;object-fit:cover; max-width:100%;max-height:100%">
        </div>
        <div class="col-lg-6 col-md-6">
            <form method="POST" class="p-5">
                <h2 class="text-center text-capitalize mt-3 mb-4 text-black fw-bold">Thêm Quản Lý</h2>
                <div class="mb-3">
                    <label class="form-label fw-bold ">Tên đăng nhập:</label>
                    <input type="text"
                        class="form-control <?php echo isset($errors['name']) ? 'border border-danger' : '' ?>"
                        placeholder="Tên đăng nhập..." name="admin_name">
                    <p class="text-danger mt-2 "><?php echo isset($errors['admin_name']) ? $errors['admin_name'] : '' ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Mật khẩu:</label>
                    <input type="password"
                        class="form-control <?php echo isset($errors['name']) ? 'border border-danger' : '' ?>"
                        placeholder="Nhập mật khẩu..." name="password">
                    <p class="text-danger mt-2 "><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
                </div>
                <div class="d-block text-center">
                    <button type="submit"
                        class="btn btn-primary w-100 text-capitalize fw-bold rounded-pill mb-3 mt-2 btn-lg"
                        style="font-size:18px" name="signup">Thêm mới</button>
                </div>
                <a href="login.php" class="text-decoration-none text-center"
                    style="font-size:14px; display:inline-block">Đã có tài
                    khoản, đăng
                    nhập</a>
            </form>
        </div>
    </div>
    <?php include_once "./partials/footer.php" ?>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $("input").focus();
})
</script>

</html>