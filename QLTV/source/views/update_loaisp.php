<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/styleindex.css">
    <title>Quản lý thư viện</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-library'></i>
            <div class="logo-name"><span>THƯ </span>VIỆN</div>
        </a>
        <ul class="side-menu">
            <li><a href="quantri.php?action=adProducttype"><i class='bx bxs-book-content'></i>Quản lý loại sách</a></li>
            <li><a href="quantri.php?action=adProduct"><i class='bx bxs-book'></i>Quản lý sách</a></li>
            <li><a href="KH.php"><i class='bx bx-group'></i>Quản lý độc giả</a></li>
            <li><a href="donhang.php"><i class='bx bx-book-reader'></i>Quản lý mượn trả</a></li>
            <li><a href="#"><i class='bx bx-search'></i>Tìm kiếm</a>
                <ul class="menu2">
                    <li><a href="search_product1.php">Sách</a></li>
                    <li><a href="search_product2.php">Độc giả</a></li>
                    <li><a href="search_product3.php">Mượn trả</a></li>
                </ul>
            </li>
            <li><a href="thongke.php"><i class='bx bx-chart'></i>Thống kê báo cáo</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->
    <div class="content">
        <div class="main">
        <?php
            require_once("connect.php");
            $id=$_GET["id"];
            $sql="SELECT * FROM adproducttype WHERE ma_loaisp='$id'";
            $rel=mysqli_query($conn,$sql);
            $sanpham=mysqli_fetch_assoc($rel);
            if(!$sanpham){
                echo "không tìm thấy sản phẩm";
                exit();
            }
            $txt_maloaisp = isset($_POST["txt_maloaisp"]) ? $_POST["txt_maloaisp"] : $sanpham['ma_loaisp'];
            $txt_tenloaisp = isset($_POST["txt_tenloaisp"]) ? $_POST["txt_tenloaisp"] : $sanpham['ten_loaisp'];
            $txt_motaloaisp = isset($_POST["txt_motaloaisp"]) ? $_POST["txt_motaloaisp"] : $sanpham['mota_loaisp'];

            if(isset($_POST["btn_update"])){
                $sql1 = "UPDATE adproducttype SET ma_loaisp = '$txt_maloaisp', ten_loaisp = '$txt_tenloaisp', mota_loaisp = '$txt_motaloaisp' WHERE ma_loaisp = '$id'";
                $rel1 = mysqli_query($conn, $sql1);
                echo "bbạn đã cập nhập thành công";
                header('location: quantri.php?action=adProducttype');
            }
        ?>

            <form action="" method="post">
                <table width="400" border="1">
                    <tr>
                        <td colspan="2" style="text-align: center;">Cập nhập loại sách</td>
                    </tr>
                    <tr>
                        <td>Mã loại sách</td>
                        <td><input name="txt_maloaisp" type="text" value="<?php echo $txt_maloaisp; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tên loại sách</td>
                        <td><input name="txt_tenloaisp" type="text" value="<?php echo $txt_tenloaisp; ?>"></td>
                    </tr>
                    <tr>
                        <td>Mô tả loại sản phẩm</td>
                        <td><textarea name="txt_motaloaisp" type="text" value="<?php echo $txt_motaloaisp ?>"><?php echo $txt_motaloaisp ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input name="btn_update" type="submit" value="Update"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>
