<?php
session_start();
include_once "../../../Constants.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $errors[] = match ($error) {
            $error['password'] => '<p class="text-center">Lỗi sai mật khẩu</p>',
            $error['username'] => '<p class="text-center">Lỗi sai tên đăng nhập</p>',
            default => '',
        };
        array_push($errors, $error);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $passwordLength = strlen($password);
        $check = false;
        $errors = [];
        define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
        define('REQUIRED_PASSWORD_LENGTH', 'Mật khẩu phải lớn hơn 6 kí tự');
        if ($username = 'username' && $password = '123456') {
            echo "<script language='javascript' type='text/javascript'>
                window.alert('Đăng nhập thành công !!');
                window.location.href ='../layout/index.php';
                </script>";
            $check = true;;
            $_SESSION['user'] = $name;
        }
        if ($password === 'd41d8cd98f00b204e9800998ecf8427e') {
            $errors['password'] = REQUIRE_FIELD_ERROR;
        }
        if (empty($username) || empty($password)) {
            $errors['username'] = $errors['password'] =  REQUIRE_FIELD_ERROR;
            echo '<script type="text/javascript">
            window.alert("Vui lòng điền đầy đủ các trường")
        </script>';
            $check = false;
        } else if ($passwordLength < 6) {
            $errors['password'] = REQUIRED_PASSWORD_LENGTH;
            $check = false;
        } else {
            $sql = "SELECT * FROM `tbl_users` WHERE username = '$username' AND  password = '$password'";
            $selectName = "SELECT username FROM `tbl_users` WHERE username = '$username' AND password = '$password'";
            $query = renderSingleRecord($selectName);
            while ($row = $query->fetch_assoc()) {
                $name = $row['username'];
            }
            $result = $conn->query($sql);
            if ($result) {
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    echo "<script language='javascript' type='text/javascript'>
                window.alert('Đăng nhập thành công !!');
                window.location.href ='../layout/index.php';
                </script>";
                    $check = true;;
                    $_SESSION['user'] = $name;
                } else {
                    echo "<script language='javascript' type='text/javascript'>
                window.alert('Tên đăng nhập hoặc mật khẩu không đúng !!');
                window.location.href ='login.php';
                </script>";
                }
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
    <?php include_once '../../../Constants.php'; ?>
    <link rel="stylesheet" href="../../../../public/css/users/forms/form.css">
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
    <div class="row mx-auto shadow" id="user-form__container">
        <div class="col-sm-6 col-lg-6" id="user-login-form__image">
            <img src="https://img.freepik.com/free-vector/chatbot-customer-service-abstract-concept_335657-3037.jpg?w=740&t=st=1681325345~exp=1681325945~hmac=c3bc6fb3377880c87f5cf60f215ec00afdc451308d5d970387717b19c4be3054" alt="Đăng Nhập" class="my-3">
        </div>
        <div class="container mx-auto col-sm-6 col-lg-6">
            <form method="POST" action="login.php" id="login-form">
                <h3 class="text-center text-capitalize mb-4">Đăng nhập</h3>
                <div class="mb-3">
                    <label class="form-label fw-bold label-text">Tên đăng nhập:</label>
                    <input type="text" class="form-control input-text <?php echo isset($errors['username']) ? 'border border-danger' : "" ?>" placeholder="abcd..." name="username" autocomplete="off" value=<?php echo isset($username) ? $username : "" ?>>
                    <p class="text-danger mt-2">
                        <?php echo $errors['username'] ?? $errors['username']  ?? "" ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold label-text">Mật khẩu:</label>
                    <input type="password" class="form-control input-text<?php echo isset($errors['password']) ? 'border border-danger' :  "" ?>" placeholder="Mật khẩu của bạn..." name="password" autocomplete="off">
                    <p class="text-danger mt-2">
                        <?php echo $errors['password'] ?? $errors['password'] ?? "" ?>
                    </p>
                </div>
                <div class="d-block text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100 text-capitalize  rounded-pill fw-bold" style="font-size:16px" name="signin">Đăng
                        nhập</button>
                </div>
                <a href='register.php' class="mt-3 d-block text-decoration-none text-center fw-bold" style="font-size: 14px">Chưa có tài
                    khoản? Đăng Ký </a>
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