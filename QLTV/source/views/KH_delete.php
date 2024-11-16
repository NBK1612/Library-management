<?php
require_once("connect.php");
if(isset($_GET["id"])){
    $id = isset($_GET["id"])?$_GET["id"]:"";
    $sql = "DELETE FROM customer WHERE makh = '$id'";
    $rel = mysqli_query($conn,$sql);
    echo "Xóa thành công";
    header('location: KH.php?action=KH');
}
?>