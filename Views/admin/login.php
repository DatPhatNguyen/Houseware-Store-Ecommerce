<?php
include_once "../utils/operator.php";
include_once "../utils/script.php";
include_once "../../Database.php";
session_start();
$errors = [];
$check = false;
define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = validData($_POST['admin_name']);
    $password = validData($_POST['password']);
    // $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $hash_password = md5($password);
    if (empty($name) || empty($hash_password)) {
        $errors['admin_name'] = $errors['password'] = REQUIRE_FIELD_ERROR;
        $check = false;
    } else {
        $sql = "SELECT * FROM `tbl_admin` WHERE admin_name = '$name' AND password ='$hash_password'";
        $admin = $conn->query($sql);

        //todo get admin name
        $selectName = "SELECT admin_name FROM `tbl_admin` WHERE admin_name = '$name' AND password = '$hash_password'";
        $querySelectName = $conn->query($selectName);

        //todo get admin's information
        while ($row = $querySelectName->fetch_assoc()) {
            $name = $row['admin_name'];
        }

        //todo login successfully
        if (mysqli_num_rows($admin) > 0) {
            echo "<script language='javascript'>
                window.alert('Đăng nhập thành công')
                window.location.href = 'index.php'
                </script>";
            $_SESSION['admin'] = $name;
            $check = true;
        }
        //todo failed to login
        else {
            echo "<script language='javascript'>
                window.alert('Tên đăng nhập hoặc mật khẩu không đúng !!')
                window.location.href = 'login.php'
                </script>";
            $check = false;
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
    <title>Admin đăng nhập</title>
    <link rel="stylesheet" href="../../../../public/css/admin/app.css">

    <style>
        .row {
            max-width: 60%;
            border-radius: 24px;
            background: #fff;
            margin: 30px 0 50px 0;
        }

        #login-leftside {
            border-top-left-radius: 24px;
            border-bottom-left-radius: 24px"

        }

        #choose-typeuser {
            margin: 40px 0 20px 40px;
        }
    </style>
</head>

<body>
    <?php include_once "./partials/header.php" ?>

    <a href="../type-user.php" class="text-decoration-none">
        <button class="btn btn-primary " id="choose-typeuser">Chọn loại người dùng</button>
    </a>
    <div class="row mx-auto shadow-lg">
        <div class="col-sm-6 col-lg-6" id="login-leftside">
            <img src="../../../public/images/admin-signin.jpg" class="my-3" style="object-position:center;object-fit:cover; max-width:100%;max-height:100%">
        </div>
        <div class="col-md-6 col-lg-6 ">
            <form method="POST" class="p-5" id="login-form">
                <h3 class="text-center text-capitalize my-4 text-black fw-bold">Đăng nhập</h3>
                <div class="mb-3 form-group">
                    <label class="form-label fw-bold">Tên đăng nhập: </label>
                    <input type="text" class="form-control  <?php echo isset($errors['admin_name']) ? 'border border-danger' : ''
                                                            ?>" name="admin_name" placeholder="Tên đăng nhập..." value=<?php echo isset($name) ? $name : "" ?>>
                    <p class="text-danger mt-2 text-error">
                        <?php echo isset($errors['admin_name']) ? $errors['admin_name'] : "" ?>
                    </p>
                </div>
                <div class="mb-3 form-group">
                    <label class="form-label fw-bold">Mật khẩu:</label>
                    <input type="password" class="form-control <?php echo isset($errors['password']) ? 'border border-danger' : ''
                                                                ?>" placeholder="Mật khẩu của bạn..." name="password">
                    <p class="text-danger mt-2"><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
                </div>
                <div class="d-block text-center">
                    <button type="submit" class="btn btn-primary w-100 text-capitalize fw-bold rounded-pill my-3 btn-lg" style="font-size:14px" name="signin">Đăng nhập</button>
                </div>
                <a href="signup.php" class="text-decoration-none text-center" style="display:inline-block; font-size:14px;">Chưa có
                    khoản, đăng
                    ký</a>
            </form>
        </div>
    </div>
    <?php include_once "./partials/footer.php" ?>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("input").focus();
    }, );
</script>

</html>