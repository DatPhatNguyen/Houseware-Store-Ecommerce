<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-img-top {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .row {
            max-width: 900px;
            margin: 100px auto 0 auto;
            background-color: #fff;
            padding: 48px 60px;
        }
    </style>
</head>

<body>
    <?php
    include_once "../Views/utils/script.php"
    ?>
    <div class="row shadow-lg text-center">
        <h3 class="text-capitalize text-start mb-4" style="font-weight:900; font-family:Roboto,san-serif; margin-left: -20px;">Chọn
            loại người dùng
        </h3>

        <div class="col-sm-6 col-lg-6">
            <div class="card">
                <img src="../../public/images/admin.jpg" alt="admin" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title mt-2 mb-3 text-capitalize fw-bold">Quản Lý</h5>
                    <a href="../Views/admin/login.php" class="card-text">
                        <button class="btn btn-primary w-50  text-uppercase" style="font-weight:600;">Chọn</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6">
            <div class="card">
                <img src="../../public/images/user.jpg" alt="user" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title mt-2 mb-3 text-capitalize fw-bold">Người Dùng</h5>
                    <a href="../Views/users/login.php" class="card-text">
                        <button class="btn btn-primary w-50  text-uppercase" style="font-weight:600;">Chọn</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>