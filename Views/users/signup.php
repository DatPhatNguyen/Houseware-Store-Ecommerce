<?php
include_once "../utils/operator.php";
include_once "../utils/script.php";
include_once "../../Database.php";
$errors = [];
$check = false;
define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
define('REQUIRE_PASSWORD_LENGTH', 'Mật khẩu phải lớn hơn 6 kí tự');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = validData($_POST['username']);
    $password = validData($_POST['password']);
    // $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $hash_password = md5($password);
    $check = false;
    if (empty($username) || empty($hash_password)) {
        $errors['username'] = $errors['password'] = REQUIRE_FIELD_ERROR;
        $check = false;
    } else {
        $sql = "SELECT * FROM `tbl_users` WHERE 'username' = '$username' AND 'password' = '$hash_password'";
        $query = $conn->query($sql);
        if (mysqli_num_rows($query) > 0) {
            echo "<script language='javascript' type='text/javascript'>
                 window.alert('Tài khoản đã tồn tại!!')
                 window.location.href='signup.php'
                </script>";
            $check = false;
        } else {
            $sql = "INSERT INTO `tbl_users` (username,password) VALUES ('$username', '$hash_password')";
            $result = $conn->query($sql);
            if ($result) {
                echo "<script language='javascript' type='text/javascript'>
                 window.alert('Đăng ký thành công!!')
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
    <title>Đăng ký người dùng</title>
    <style>
        .row {
            max-width: 60%;
            border-radius: 30px;
            background: #fff;
            margin: 80px 0 70px 0;
        }

        .signup-leftside img {
            object-position: center;
            object-fit: cover;
            max-width: 100%;
            max-height: 100%
        }
    </style>
</head>

<body>
    <?php include_once "./partials/header.php" ?>

    <div class="row mx-auto shadow">
        <div class="col-sm-6 col-lg-6" class="signup-leftside">
            <img src="../../../public/images/parent-signup.jpg" class="my-3">
        </div>
        <div class="col-lg-6 col-md-6" class="signup-rightside">
            <form method="POST" class="p-5">
                <h2 class="text-center text-capitalize mt-3 mb-4 mb text-black fw-bold">Đăng Ký</h2>
                <div class="mb-3">
                    <label class="form-label fw-bold ">Tên đăng nhập:</label>
                    <input type="text" class="form-control <?php echo isset($errors['username']) ? 'border border-danger' : '' ?>" placeholder="Tên đăng nhập..." name="username">
                    <p class="text-danger mt-2 "><?php echo isset($errors['username']) ? $errors['username'] : '' ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold ">Số điện thoại:</label>
                    <input minlength="10" maxlength="10" type="text" class="form-control <?php echo isset($errors['telephone']) ? 'border border-danger' : '' ?>" placeholder="Số điện thoại..." name="telephone">
                    <p class="text-danger mt-2 "><?php echo isset($errors['telephone']) ? $errors['telephone'] : '' ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold ">Địa chỉ:</label>
                    <input type="text" class="form-control <?php echo isset($errors['address']) ? 'border border-danger' : '' ?>" placeholder="Địa chỉ..." name="address">
                    <p class="text-danger mt-2 "><?php echo isset($errors['address']) ? $errors['address'] : '' ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Mật khẩu:</label>
                    <input type="password" class="form-control <?php echo isset($errors['password']) ? 'border border-danger' : '' ?>" placeholder="Nhập mật khẩu..." name="password">
                    <p class="text-danger mt-2 "><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
                </div>
                <div class="d-block text-center">
                    <button type="submit" class="btn btn-primary w-100 text-capitalize fw-bold rounded-pill mb-3 " name="signup">Đăng ký</button>
                </div>
                <a href="login.php" class="text-decoration-none text-center" style="display:inline-block">Đã có tài
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