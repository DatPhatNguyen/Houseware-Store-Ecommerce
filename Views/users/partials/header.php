<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="../../../../public/css/app.css" />
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="../Views/../users/layout/index.php" class="nav-item__logo">
                <img src="../../../../public/images/water-pipe-icon-logo-template-illustration-design-vector.jpg"
                    alt="" />
            </a>

            <!-- <a href="../category.php" class="nav-item" id="nav-item__category">Phân Loại -->
            <!-- <i class="fa-solid fa-caret-down"></i> -->
            <!-- </a> -->
            <!-- <a href="../show-product.php" class="nav-item">Sản Phẩm</a>
            <a href="" class="nav-item">Bán Chạy</a> -->
        </div>
        <div class="nav-search-input">
            <input type="text" placeholder="Tìm kiếm sản phẩm..." />
            <button class="btn btn-outline-primary" style="font-size: 14px;  border-radius: 24px;" type="submit"
                name="search-product">Tìm
                sản
                phẩm</button>
        </div>
        <!-- Neu -->
        <!-- <div class="nav-users">
                <div class="nav-users__account">
                    <a href=""> <i class="fa-solid fa-cart-shopping"></i> Cart</a>
                </div>
                <div class="nav-users__cart">
                    <a href=""> <i class="fa-solid fa-user"></i> Account</a>
                </div>
                <a href="../logout.php" class="nav-logout__btn ">Đăng Xuất</a>
            </div> -->
        <?php echo (isset($_SESSION['username'])) ?
            '<div class="nav-access">
            <a href="detail-user.php" class="nav-login__name">
                <i class="fa-solid fa-user" style="margin-right: 6px"></i>
                ' . $_SESSION['username'] . '</a>
             <a href="../logout.php" class="nav-logout__btn ">Đăng Xuất</a>
        </div>'
            : ""
        ?>
    </nav>

</body>
<script type="text/javascript">
const navItem = document.querySelectorAll(".nav-item");
const iconDropDown = document.querySelector(".fa-caret-down");
navItem.forEach((item) => {
    item.addEventListener("mouseover", function(event) {
        item.classList.add("active");
        event.stopPropagation();
    });
    navItem.forEach((item) => {
        item.addEventListener("mouseout", function(event) {
            item.classList.remove("active");
            item.style.transition;
            event.stopPropagation();
        });
    });
});

/*
let slideIndex = 1;
const slideShow = (n) => {
  let i;
  let slides = document.querySelector(".slides");
  let dots = document.querySelector(".dot");

  const plusSlide = () => {};
  // Truyen doi so vao neu no lon hon so luong img thi gan = 1
  if (n > slides.length) {
    slideIndex = 1;
  } else if (n < slides.length) {
    slideIndex = slides.length;
  }
  // set

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    slides[i].style.display = "active";
  }
};
*/
</script>

</html>