<?php
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
>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../public/css/app.css" />
</head>

<body>
    <section class="product-detail-section">

        <!-- Product main ( image ) -->
        <div class="product-detail">
            <div class="product-main-img">
                <img src="" alt="" />
            </div>
        </div>

        <!-- Product detail infor ( name , description, price) -->

        <div class="product-detail_infor">
            <h2 class="product-name">Tên sản phẩm</h2>
            <p class="product-description">Mô tả sản phẩm</p>
            <h2 class="product-price">10.000</h2>

            <!-- Form  -->
            <form class="product-form__input">
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

            <!-- Cart  -->
            <div class="product-cash">
                <button id="buy-btn">Buy Now</button>
                <button id="atc-btn">Add to Cart</button>
            </div>
        </div>
    </section>
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