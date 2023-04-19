<?php
if (!isset($_SESSION)) {
    session_start();
} else {
    session_destroy();
    session_start();
}
include_once "../../../Constants.php";
// $result = match (8.0) {
//     '8.0' => 'Oh no this is string',
//     8.0 => 'This is true',
// };
// echo $result;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $password = password_hash($password, PASSWORD_DEFAULT);
        $passwordLength = strlen($password);
        $check = false;
        $errors = [];
        define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
        define('REQUIRED_PASSWORD_LENGTH', 'Mật khẩu phải lớn hơn 6 kí tự');
        if ($password === 'd41d8cd98f00b204e9800998ecf8427e') {
            $errors['password'] = REQUIRE_FIELD_ERROR;
        }
        if (empty($username) || empty($password)) {
            $errors['username'] = $errors['password'] = REQUIRE_FIELD_ERROR;
            $check = false;
            // echo
            // '<script type="text/javascript">
            //     window.alert("Vui lòng điền đầy đủ các trường")
            // </script>';
        } else if ($passwordLength < 6) {
            $errors['password'] = REQUIRED_PASSWORD_LENGTH;
            $check = false;
        } else {
            $sql = "INSERT INTO  `tbl_users` (username,password ) VALUE '$username', '$password'";
            $result = $conn->query($sql);
            if ($result) {
                echo
                "<script language='javascript' type='text/javascript'>
                        window.alert('Đăng ký thành công !!');
                        window.location.href ='login.php';
                </script>";
                $check = true;;
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
    <title>Người Dùng Đăng Nhập</title>
    <link rel="stylesheet" href="../../../../public/css/users/forms/form.css">
    <?php include "../../utils/script.php"; ?>
    <style>
        .text-danger {
            font-size: 14px;
        }

        #user-form__container {
            width: 55%;
            border-radius: 24px;
            background: #fff;
            margin: 32px 0;
        }

        #user-register-form__image {
            border-top-left-radius: 24px;
            border-bottom-left-radius: 24px
        }

        #user-register-form__image img {
            object-position: center;
            object-fit: cover;
            max-width: 100%;
            max-height: 100%
        }
    </style>
</head>

<body>

    <!-- <header class="header" id="header">
        <div class="container-fluid mx-auto shadow header-container" id="top">
            <div class=" d-flex justify-content-between  align-items-center mx-5"> -->
    <!-- index logo
    <div>
        <a href='index.php'><img src='../template/images/logo-ctu.png' class='d-inline-block' style='width:60px; height:auto;'></a>
        <a href="index.php" class="text-capitalize text-success text-decoration-none active ms-3">Trang
            chủ</a>
    </div>
    <?php echo isset($_SESSION['student'])
        ?
        '<div class="pt-1">
                    <p class="me-3" style="font-weight:700; font-size:18px; display:inline-block">' . $_SESSION['student'] . '</p>
                    <button type="submit" class=" border btn btn-danger py-2 px-4 text-center ">
                        <a href="logout.php" class="text-white text-decoration-none text-capitalize text-button">Đăng xuất</a>
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
    </header> -->
    <?php
    include_once "../partials/header.php"
    ?>
    <div class="row mx-auto mt-5 shadow" id="user-form__container">
        <div class="col-sm-6 col-lg-6" id="user-register-form__image">
            <img src="https://img.freepik.com/free-vector/organic-flat-customer-support-illustration_23-2148899174.jpg?w=740&t=st=1681329779~exp=1681330379~hmac=e3f1acfdc9eb63c690e800ef526f6fff4ace9acea401df975898b956fdb885f7" alt="Đăng Ký" class="my-3">
        </div>
        <div class="container mx-auto col-sm-6 col-lg-6">
            <form method="POST" style="padding:50px" action="register.php">
                <h2 class="text-center text-capitalize mb-4">Đăng Ký</h2>
                <div class="mb-3">
                    <label class="form-label fw-bold label-text">Tên đăng nhập:</label>
                    <input type="text" class="form-control input-text <?php echo isset($errors['username']) ? 'border border-danger' : "" ?>" placeholder="abcd..." name="username" minlength="8" maxlength="8" autocomplete="off" value=<?php echo isset($username) ? $username : "" ?>>
                    <p class="text-danger mt-2">
                        <?php echo $errors['username'] ?? $errors['username']  ?? "" ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold label-text">Mật khẩu:</label>
                    <input type="password" class="form-control input-text <?php echo isset($errors['password']) ? 'border border-danger' :  "" ?>" placeholder="Mật khẩu của bạn..." name="password" autocomplete="off">
                    <p class="text-danger mt-2">
                        <?php echo $errors['password'] ?? $errors['password'] ?? "" ?>
                    </p>
                </div>
                <div class="d-block text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100 text-capitalize  rounded-pill fw-bold" style="font-size:16px" name="register">Đăng
                        Ký</button>
                </div>
                <a href='login.php' class="mt-3 d-block text-decoration-none text-center fw-bold" style="font-size: 14px">Đã có tài khoản, đăng nhập </a>
            </form>
        </div>
    </div>
    <?php include "../../users/partials/footer.php" ?>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("input").focus();
    })
</script>

</html>