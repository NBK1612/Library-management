<?php
require_once("connect.php");
if(isset($_GET["id"])){
    $id = isset($_GET["id"])?$_GET["id"]:"";
    $sql = "DELETE FROM adproduct WHERE ma_sp = '$id'";
    $rel = mysqli_query($conn,$sql);
    echo "Xóa thành công";
    header('location: quantri.php?action=adProduct');
}
?>