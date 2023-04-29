<?php
include_once "../../Database.php";
include_once "../utils/operator.php.php";
include_once "../utils/script.php.php";
$productID = $_GET['productid'] ?? null;
$sql = "DELETE FROM `tbl_products` WHERE id = '$productID'";
$result = $conn->query($sql);
if ($result) {
    echo
    "<script language='javascript'>
            window.confirm('Bạn có muốn xóa sản phẩm này không?');
            window.location.href='product-manage.php';
         </script>";
} else {
    echo
    "<script language='javascript' type='text/javascript'>
            window.alert('Xóa thất bại');
            window.location.href='product-manage.php';   
     </script>";
}
?>
<script type="text/javascript">
    function deleteStudent(id) {
        const option = confirm('Bạn có muốn xóa sản phẩm này không?');
        if (!option) {
            return;
        }
        console.log(id);
        $.ajax()
    }
</script>