<?php
session_start();
include_once "../utils/operator.php";
include_once "../utils/script.php";
// get id
$productID = $_GET['productid'] ?? $_POST['productid'] ?? null;
// sql to show value into update input
$sql = "SELECT * FROM `tbl_products` WHERE id = '$productID' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['title'];
$description = $row['description'];
$price = $row['price'];
$quantity = $row['quantity'];
$image = $row['image'];
$category = $row['category'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $title = validData($_POST['product-title']);
        $description = validData($_POST['product-description']);
        $price = validData($_POST['product-price']);
        $quantity = $_POST['product-quantity'];
        $image = $_POST['product-image'];
        $category = $_POST['product-category'];
        $sql =
            "UPDATE `tbl_products` 
                SET `id` ='$productID', 
                `title`='$title' , 
                `description` = '$description', 
                `price` = '$price' , 
                `quantity` = '$quantity', 
                `image` = '$image', 
                `category` = '$category' 
                WHERE `id` = '$productID'";
        $result  = $conn->query($sql);
        if ($result) {
            echo "<script language='javascript' type='text/javascript'>
                window.alert('Chỉnh sửa sản phẩm thành công');
                window.location.href='products-manage.php';   
                </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            window.alert('Chỉnh sửa sản phẩm thât bại');
            window.location.href='update-product.php';   
            </script>";
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
    <title>Chỉnh sửa phụ huynh</title>
    <style>
        .container {
            max-width: 40vw;
            background: #fff;
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <?php include "./partials/header.php" ?>
    <button class="btn btn-primary ms-4 mt-5">
        <a href="products-manage.php" class="text-decoration-none text-light">Xem danh sách sản phẩm</a>
    </button>
    <h2 class="text-center text-uppercase my-5" style="font-weight:900;">Chỉnh sửa sửa phẩm
    </h2>
    <div class="container mt-3 mb-5 mx-auto shadow p-5">
        <form method="POST" enctype="multipart/form-data" id="form" name="form">
            <div class="mb-3">
                <label class="form-label fw-bold">Nhập tên sản phẩm:</label>
                <input class="form-control product-title" type="text" name="product-title" value=<?php echo isset($title) ? $title : "" ?> />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nhập số lượng sản phẩm:</label>
                <input class="form-control  product-quantity" type="number" name="product-quantity" min="1" max="500" placeholder="1" value=<?php echo isset($quantity) ? $quantity : "" ?> />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nhập giá sản phẩm:</label>
                <input class="form-control product-price" type="text" name="product-price" placeholder="4.000" value=<?php echo isset($price) ? $price : "" ?> />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Mô tả sản phẩm:</label>
                <input class="form-control " type="text" name="product-description" placeholder="Sản phẩm này dùng để..." value="<?php echo isset($description) ? $description : ""  ?>" />
            </div>
            <div class=" mb-3">
                <label class="form-label fw-bold">Loại sản phẩm:</label>
                <select name="product-category" class="form-select">
                    <option value="<?php echo isset($category) ? $category : "" ?>" selected="selected">Chọn loại sản
                        phẩm</option>
                    <option value="Ống nước">Ống nước</option>
                    <option value="Điện gia dụng">Điện gia dụng</option>
                    <option value="Tạp vặt khác">Khác</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Hình ảnh sản phẩm: </label>
                <input type="file" name="product-image" class="form-control mb-3" value=<?php echo isset($image) ? $image : "" ?> />
            </div>
            <button class="btn btn-primary mt-2" name="update">Chỉnh sửa sản phẩm</button>
        </form>
    </div>
    <?php include_once "./partials/footer.php" ?>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("input").focus();
    })
</script>

</html>