<?php
include_once "../../Database.php";
include_once "../utils/operator.php";
include_once "../utils/script.php";
session_start();
if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];
    $cart_array = array(
        'item_id' => $item_id,
        'item_name' => $item_name,
        'item_price' => $item_price,
        'item_quantity' => $item_quantity
    );
    if (isset($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'][] = $cart_array;
    } else {
        $_SESSION['shopping_cart'] = array($cart_array);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/app.css" />
</head>

<body>
    <?php include_once "./partials/header.php" ?>

    <section class="product-detail-section">
        <?php
        $productID = $_GET['productid'] ?? null;
        $sql = "SELECT * FROM `tbl_products` WHERE id = '$productID'";
        $products = renderMultipleRecord($sql);
        foreach ($products as $product) {
            echo '
                    <div class="product-detail">
                        <div class="product-main-img">
                            <img src=' . $product['image'] . ' alt="" />
                        </div>
                    </div>

                    <div class="product-detail_infor">
                        <h2 class="product-name">' . $product['title'] . '</h2>
                        <p class="product-description">' . $product['description'] . '</p>
                    <hr />

                        <h2 class="product-price" style="padding: 6px 0;">' . $product['price'] . '</h2>
                    <hr />
                        <form class="product-form__input" style="padding: 6px 0;">
                            <div class="input-cover">
                                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                                    -
                                </div>
                                <input type="number" id="number" value="1" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">
                                    +
                                </div>
                            </div>
                        </form>
                    <hr />

                        <p class="sold-out">Còn lại <span>' . $product['quantity'] . ' sản phẩm </span>đừng bỏ lỡ</p>

                        <!-- Cart  -->
                        <form class="product-cash" method="POST">
                            <button id="buy-btn">Buy Now</button>
                            <button id="atc-btn">Add to Cart</button>
                        </form>
                        <div class="delivery">
                            <i class="fa-solid fa-truck delivery-freeship__icon"></i>                 
                            <span class="delivery-freeship__title">Miễn phí vận chuyển</span>
                            <p class="delivery-freeship__code" >Nhập mã để được miễn phí vận chuyển</p>
                        </div>
                    </div>';
        }
        ?>
    </section>

    <?php include_once "./partials/footer.php" ?>
</body>

<script>
    const increaseValue = () => {
        var value = parseInt(document.getElementById("number").value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById("number").value = value;
    }

    const decreaseValue = () => {
        var value = parseInt(document.getElementById("number").value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? (value = 1) : "";
        value--;
        document.getElementById("number").value = value;
    }
</script>

</html>