    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
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
        <link rel="stylesheet" href="../../public/css/app.css" />
    </head>

    <body>
        <?php ?>
        <div class="product-list__main-content">
            <h4 class="best-selling">Top sản phẩm bán chạy nhất</h4>
            <section class="product-list-section">
                <?php
                $sql = "SELECT * FROM `tbl_products` WHERE category ='Ống nước'";
                $products = renderMultipleRecord($sql);
                foreach ($products as $product) {
                    echo '
                <div class="product-item">
                    <div class="product-item__image">
                        <a href="../product-detail.php?productid=' . $product['id'] . '">
                            <img src=' . $product['image'] . ' alt="" />
                        </a>
                    </div>
                    <div class="product-item__infor">
                        <p class="product-name">' . $product['title'] . '</p>
                        <p class="product-price">' . $product['price'] . '<sup>đ</sup></p>
                    </div>
                    <p class="product-item__description">' . $product['description'] . '</p>
                    <button type="submit" class="btn-atc" value="add_to_cart">Add to Cart</button>
                    
                    </div>';
                }
                ?>
            </section>
        </div>
    </body>

    </html>