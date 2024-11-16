<?php
    require_once("connect.php");
    $ma_loaisp=isset($_POST["ma_loaisp"])?$_POST["ma_loaisp"]:"";
    $ma_sp=isset($_POST["ma_sp"])?$_POST["ma_sp"]:"";
    $ten_sp=isset($_POST["ten_sp"])?$_POST["ten_sp"]:"";
    $hinhanh=isset($_FILES['hinhanh'])?$_FILES['hinhanh']['name']:"";
    $soluong=isset($_POST["soluong"])?$_POST["soluong"]:"";
    $mota_sp=isset($_POST["mota_sp"])?$_POST["mota_sp"]:"";
    $create_date=isset($_POST["create_date"])?$_POST["create_date"]:"";
        if(isset($_POST["btn_save"])){
            $sql1="SELECT * FROM adproduct WHERE ma_sp='$ma_sp'";
            $rel1=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($rel1)>0){
            echo"đã tồn tại mã sản phẩm này";
        }else{
            $sql2="INSERT INTO adproduct VALUES('$ma_loaisp',' $ma_sp','$ten_sp','$hinhanh','$soluong','$mota_sp',' $create_date')";
            $rel2=mysqli_query($conn,$sql2);
            echo"Bạn đã lưu thành công";
        }
}
?> 
<form action=""method="post" enctype="multipart/form-data">
<table width="500" height="578" border="1">
    <tr>
        <td height="44" colspan="2" style="text-align: center;">Thêm sách mới</td>
    </tr>
    <tr>
        <td height="40">Thể loại sách</td>
        <td width="273">
            <?php 
                $sql="SELECT * FROM adproducttype";
                $rel=mysqli_query($conn,$sql);
            ?>
            <select name="ma_loaisp">
                <?php if (mysqli_num_rows($rel)>0) {
                    while ($r= mysqli_fetch_assoc($rel)) {
                    ?> 
                    <option value="<?php echo $r['ma_loaisp']?>"> 
                    <?php echo $r['ma_loaisp']?>
                    </option>
                    <?php 
                    }
                }?>
            </select>
        </td>
    </tr>
    <tr>
        <td height="40">Mã sách</td>
        <td>
            <input name="ma_sp" type="text">
        </td>
    </tr>
    <tr>
        <td height="40">Tên sách</td>
        <td>
            <input name="ten_sp" type="text">
        </td>
    </tr>
    <tr>
        <td height="40">Hình ảnh</td>
            <?php
            if (isset($_FILES['hinhanh'])){
                $file_name=$_FILES['hinhanh']['name'];
                $file_tmp =$_FILES['hinhanh']['tmp_name'];
                move_uploaded_file($file_tmp,"images/".$file_name); 
                }
            ?>
        <td><input name="hinhanh" type="file"></td>
    </tr>
    <tr>
        <td height="40">Số lượng</td>
        <td>
            <input name="soluong" type="text">
        </td>
    </tr>
    <tr>
        <td height="100">Mô tả</td>
        <td>
            <textarea name="mota_sp" cols="40" rows="5"></textarea>
        </td>
    </tr>
    <tr>
        <td height="40">Ngày tạo</td>
        <td>
            <input name="create_date" type="date">
        </td>
    </tr>
    <tr>
        <td height="40" colspan="2" style="text-align: center;">
            <input name="btn_save" type="submit" value="Thêm">
        </td>
    </tr>
</table>
</form>