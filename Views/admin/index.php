<?php
session_start();
if (empty($_SESSION['admin'])) {
    echo '<script type="text/javascript">
window.alert("Trước tiên bạn cần phải đăng nhập !!")
window.location.href = "../admin/login.php"
</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <style>
    .admin-page {
        margin: 0 auto;
        max-width: 1280px;
    }
    </style>
</head>

<body>
    <?php include_once "./partials/header.php" ?>
    <div class="admin-page">
        <?php
        include_once './components/dashboard.php';
        ?>
    </div>
    <?php include_once "./partials/footer.php" ?>

</body>
<?php include_once "../utils/script.php" ?>

</html>