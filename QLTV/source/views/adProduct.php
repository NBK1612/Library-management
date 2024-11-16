<?php
    require_once("connect.php");
    $sql="SELECT*FROM adproduct";
    $rel=mysqli_query($conn, $sql);
?>
<table width="1208" border="1">
    <tr>
        <th height="40" colspan="12" style="text-align: center;">QUẢN LÝ SÁCH</th>
    </tr>
    <tr>
        <td height="50" colspan="12">
        <a href="quantri.php?action=adProduct_add">Thêm mới</a>
        </td>
    </tr>
    <tr>
        <th width="145" height="60" style="text-align: center;">Thể loại sách</th>
        <th width="105" style="text-align: center;"> Mã sách </th>
        <th width="105" style="text-align: center;"> Tên sách </th>
        <th width="105" style="text-align: center;"> Hình ảnh </th>
        <th width="85" style="text-align: center;"> Số lượng </th>
        <th width="130" style="text-align: center;"> Mô tả sách </th>
        <th width="105" style="text-align: center;"> Create_date </th>
        <th width="50" style="text-align: center;"> Xóa </th>
        <th width="50" style="text-align: center;"> Sửa </th>
    </tr>
    <?php
        $sql="SELECT * FROM adproduct";
        $rel=mysqli_query($conn,$sql);
        while ($r = mysqli_fetch_assoc($rel)){
    ?>
    <tr>
        <td height="95"><?php echo $r["ma_loaisp"]; ?> </td>
        <td><?php echo $r["ma_sp"]; ?> </td>
        <td><?php echo $r["tensp"]; ?> </td>
        <td><img src="images/<?php echo $r['hinhanh'];?>" width="120"></td>
        <td><?php echo $r["soluong"]; ?> </td>
        <td><?php echo $r["mota_sp"]; ?> </td>
        <td><?php echo $r["create_date"]; ?> </td>
        <td>
            <a href="adProduct_delete.php?id=<?php echo $r["ma_sp"]; ?>">Xóa</a>
        </td>
        <td>
            <a href="adProduct_update.php?id=<?php echo $r["ma_sp"]; ?>">Sửa</a>
        </td>
    </tr>
    <?php } ?>

</table>