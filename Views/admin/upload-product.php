<?php
include_once "../../Database.php";
include_once "../utils/operator.php";
include_once "../utils/script.php";
define('REQUIRE_FIELD_ERROR', 'Vui lòng điền vào trường này');
$errors = [];
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $title = $_POST['product-title'];
    $quantity = $_POST['product-quantity'];
    $description = $_POST['product-description'];
    $price = $_POST['product-price'];
    $category = $_POST['product-category'];
    if (isset($_FILES['product-image']['name'])) {
        $image_name = $_FILES['product-image']['name'];
        $image_path = $_FILES['product-image']['tmp_name'];
        $image_destination = "../../../public/images/products./" . $image_name;
        $upload_image = move_uploaded_file($image_path, $image_destination);
        // check image uploaded or not
        if ($upload_image == false) {
            echo '<script type="text/javascript>
                    window.alert("Lỗi khi tải hình")
                    window.location.href="index.php"
            </script>"';
        } else {
            $image_name = "";
        }
    }
    if (empty($image_name)) {
        $errors['product-image'] = "Vui lòng tải thêm hình";
    }
    if (empty($title) || empty($quantity) || empty($description) || empty($price)) {
        $errors['product-title'] =
            $errors['product-quantity'] =
            $errors['product-description'] =
            $errors['product-category'] =
            $errors['product-price'] = REQUIRE_FIELD_ERROR;
    } else {
        $sql = "INSERT INTO `tbl_products` 
            (title,quantity,image,price,description,category) 
                VALUES ('$title', '$quantity', '$image_name','$price','$description','$category')";
        $result = $conn->query($sql);
        if ($result) {
            echo '<script type="text/javascript">
                    window.alert="Thêm sản phẩm thành công !!"
                    window.location.href="products-manage.php";
                </script>';
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
    <style>
        .main-content {
            margin-top: 40px;
            padding: 50px;
            max-width: 1280px;
        }
    </style>
</head>

<body>
    <?php include_once "./partials/header.php" ?>
    <div class="main-content w-50 mx-auto">
        <h2 class="text-center mb-5 text-capitalize">Đăng tải sản phẩm</h2>
        <form method="POST" enctype="multipart/form-data" id="form" name="form">
            <div class="mb-3">
                <label class="form-label fw-bold" for="">Nhập tên sản phẩm:</label>
                <input class="form-control product-title" type="text" name="product-title" placeholder="Nhập tên sản phẩm" />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" for="">Nhập số lượng sản phẩm:</label>
                <input class="form-control  product-quantity" type="number" name="product-quantity" min="1" max="500" placeholder="1" />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" for="">Nhập giá sản phẩm:</label>
                <input class="form-control product-price" type="text" name="product-price" placeholder="4.000" />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" for="">Mô tả sản phẩm:</label>
                <input class="form-control " type="text" name="product-description" placeholder="Sản phẩm này dùng để..." />
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" for="">Loại sản phẩm:</label>
                <select name="product-category" class="form-select">
                    <option value="" selected>Chọn loại sản phẩm</option>
                    <option value="Ống nước">Ống nước</option>
                    <option value="Điện gia dụng">Điện gia dụng</option>
                    <option value="Tạp vặt khác">Khác</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" for="">Hình ảnh sản phẩm: </label>
                <input type="file" name="product-image" class="form-control mb-3" />
            </div>
            <button class="btn btn-primary mt-2" name="add-product">Thêm sản phẩm</button>
        </form>
    </div>
    <?php include_once "./partials/footer.php" ?>

</body>
<?php include_once "../utils/script.php" ?>
<script type="text/javascript">
    // const form = document.forms["form"];
    // const data = [];
    // form.addEventListener("submit", (event) => {
    //     event.preventDefault();
    //     console.log('Form submitted');
    //     const titleInput = form["product-title"];
    //     const titleInputValue = titleInput.value;
    //     // take element
    //     const quantityInput = form["product-quantity"];
    //     const quantityInputValue = form["product-quantity"].value;

    //     const priceInput = form["product-price"];
    //     const priceInputValue = form["product-price"].value;

    //     const descriptionInput = form["product-description"];
    //     const descriptionInputValue = form["product-description"].value;

    //     // if (titleInputValue || quantityInputValue || priceInputValue || descriptionInputValue === '') {
    //     //     alert("Vui lòng nhập đầy đủ các trường !!");
    //     //     titleInput.focus();
    //     // } 
    //     if (titleInputValue === '') {
    //         alert("Vui lòng nhập tên sản phẩm !!");
    //         titleInput.focus();
    //     } else if (quantityInputValue === '') {
    //         alert("Vui lòng nhập số lượng sản phẩm !!");
    //         quantityInput.focus();
    //     } else if (priceInputValue === '') {
    //         alert("Vui lòng nhập giá cho sản phẩm  !!");
    //         priceInput.focus();
    //         if (priceInput < 0 || isNaN(priceInput)) {
    //             alert("Vui lòng nhập giá đúng định dạng giá !!");
    //             priceInput.focus();
    //         }
    //     } else if (descriptionInputValue === '') {
    //         alert("Vui lòng nhập mô tả cho sản phẩm !!");
    //         descriptionInput.focus();
    //     } else {}
    // })
</script>

</html>