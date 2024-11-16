<?php
require_once("connect.php");

if (isset($_POST["btn_save"])) {
    $txt_maloaisp = isset($_POST["txt_maloaisp"]) ? $_POST["txt_maloaisp"] : "";
    $txt_tenloaisp = isset($_POST["txt_tenloaisp"]) ? $_POST["txt_tenloaisp"] : "";
    $txt_motaloaisp = isset($_POST["txt_motaloaisp"]) ? $_POST["txt_motaloaisp"] : "";

    $sql = "SELECT * FROM adproducttype WHERE ma_loaisp='$txt_maloaisp'";
    $rel = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rel) > 0) {
        echo "Đã tồn tại mã sp này";
    } else {
        $sql1 = "INSERT INTO adproducttype (ma_loaisp, ten_loaisp, mota_loaisp) ";
        $sql1 .= "VALUES ('$txt_maloaisp', '$txt_tenloaisp', '$txt_motaloaisp') ";
        $rell = mysqli_query($conn, $sql1);
        echo "Bạn đã thêm thành công";
    }
}
?>

<form action="" method="post">
    <table width="600" height="100" border="1">
        <tr>
            <th colspan="4" style="text-align: center;">QUẢN LÝ SÁCH</th>
        </tr>
        <tr>
            <th>
                <input name="txt_maloaisp" type="text" placeholder="Mã loại sách">
            </th>
            <th>
                <input name="txt_tenloaisp" type="text" placeholder="Tên loại sách">
            </th>
            <th>
                <input name="txt_motaloaisp" type="text" placeholder="Mô tả sách">
            </th>
            <th><input name="btn_save" type="submit" value="Lưu"></th>
        </tr>
    </table>
    <br>
    <table width 400 border="1">
        <tr>
            <th width ="200" height="60" style="text-align: center;">Mã loại sách</th>
            <th width ="220" style="text-align: center;">Tên loại sách</th>
            <th width ="200" style="text-align: center;">Mô tả sách</th>
            <th width ="100" style="text-align: center;">Xóa</th>
            <th width ="100" style="text-align: center;">Sửa</th>
        </tr>
        <?php
            $sql2="SELECT * FROM adproducttype";
            $rel2=mysqli_query($conn,$sql2);
            while ($r=mysqli_fetch_assoc($rel2)){
        ?>
            <tr>
                <td height="74"><?php echo $r["ma_loaisp"]; ?></td>
                <td><?php echo $r["ten_loaisp"]; ?></td>
                <td><?php echo $r["mota_loaisp"]; ?></td>
                <td><a href="delete_loaisp.php?id=<?php echo $r["ma_loaisp"]; ?>">Xóa</a></td>
                <td><a href="update_loaisp.php?id=<?php echo $r["ma_loaisp"]; ?>">Sửa</a></td>
            </tr>
        <?php } ?>
    </table>

</form>

</div>
</div>
</body>
</html>