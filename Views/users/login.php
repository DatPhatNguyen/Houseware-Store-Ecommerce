<?php
session_start();
include_once "../../Constants.php";
include_once "../../Database.php";
$errors = [];
define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
define('REQUIRED_PASSWORD_LENGTH', 'Mật khẩu phải lớn hơn 6 kí tự');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = validData($_POST['username']);
    $password = validData($_POST['password']);
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $hash_password = md5($password);
    $check = false;

    if (empty($username) || empty($password)) {
        $errors['username'] = $errors['password'] =  REQUIRE_FIELD_ERROR;
        $check = false;
    } else {
        $sql = "SELECT * FROM `tbl_users` WHERE username = '$username' AND password ='$hash_password'";
        $user = $conn->query($sql);

        //todo get admin name
        $selectName = "SELECT username FROM `tbl_users` WHERE username = '$username' AND password = '$hash_password'";
        $querySelectName = $conn->query($selectName);

        //todo get admin's information
        while ($row = $querySelectName->fetch_assoc()) {
            $name = $row['username'];
        }

        //todo login successfully
        if (mysqli_num_rows($user) > 0) {
            echo "<script language='javascript'>
                window.alert('Đăng nhập thành công')
                window.location.href = '../users/layout/index.php'
                </script>";
            $_SESSION['username'] = $name;
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
    <title>Người Dùng Đăng Nhập</title>
    <link rel="stylesheet" href="../../../../public/css/users/forms/form.css">
</head>

<body>
    <?php
    include_once "./partials/header.php"
    ?>
    <div class="row mx-auto shadow" id="user-form__container">
        <div class="col-sm-6 col-lg-6" id="user-login-form__image">
            <img src="https://img.freepik.com/free-vector/chatbot-customer-service-abstract-concept_335657-3037.jpg?w=740&t=st=1681325345~exp=1681325945~hmac=c3bc6fb3377880c87f5cf60f215ec00afdc451308d5d970387717b19c4be3054" alt="Đăng Nhập" class="my-3">
        </div>
        <div class="container mx-auto col-sm-6 col-lg-6">
            <form method="POST" id="login-form" action="login.php">
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
                    <button type="submit" class="btn btn-primary w-100 text-capitalize  rounded-pill fw-bold" name="signin">Đăng
                        nhập</button>
                </div>
                <a href='signup.php' class="mt-3 d-block text-decoration-none" style="font-size: 14px">Chưa có tài
                    khoản, đăng ký </a>
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