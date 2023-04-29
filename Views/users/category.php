<?php include_once "../../utils/operator.php" ?>
<?php include_once "../../utils/script.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/app.css" />
</head>

<body>
    <section class="category-section">
        <ul class="category">
            <?php
      $sql = "SELECT DISTINCT category FROM `tbl_products`";
      $categories = renderSingleRecord($sql);
      if (empty($categories)) {
        error_reporting(0);
        ini_set('display_errors', 0);
      }
      foreach ($categories as $category) {
        echo '
                <li class="category-item">
                  <a href=' . $category['category'] . '>' . $category['category'] . '</a>
                </li>
                ';
      }
      ?>
        </ul>
    </section>
</body>

</html>