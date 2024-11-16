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
                $id=isset($_GET["id"])?$_GET["id"]:"";
                $sql="SELECT * FROM adproduct WHERE ma_sp='$id'";
                $rel=mysqli_query($conn,$sql);
                $sp=mysqli_fetch_assoc($rel);
                //var_dump($sp);
                $ma_loaisp=isset($POST["ma_loaisp"])? $_POST["ma_loaisp"]:$sp['ma_loaisp'];
                $ma_sp=isset($_POST["ma_sp"])? $_POST["ma_sp"]:$sp['ma_sp'];
                $tensp=isset($_POST["tensp"])? $_POST["tensp"]:$sp['tensp'];
                $hinhanh=isset($_FILES["hinhanh"])? $_FILES['hinhanh']['name']:$sp['hinhanh'];
                $soluong=isset($_POST["soluong"])? $_POST["soluong"]:$sp['soluong'];
                $mota_sp=isset($_POST["mota_sp"])? $_POST["mota_sp"]:$sp['mota_sp'];
                $create_date=isset($_POST["create_date"])? $_POST["create_date"]:$sp['create_date'];
                if (isset($_POST["btn_save"])){
                    $sql1="UPDATE adproduct SET 
                        ma_loaisp='$ma_loaisp', 
                        ma_sp='$ma_sp', 
                        tensp='$tensp', 
                        hinhanh='$hinhanh', 
                        soluong='$soluong', 
                        mota_sp='$mota_sp', 
                        create_date='$create_date' 
                        WHERE ma_sp='$id'";
                $rel1=mysqli_query($conn, $sql1);
                header('location: quantri.php?action=adProduct');
                }
            ?>

            <form action=""method="post" enctype="multipart/form-data">
                <table width="496" border="1">
                    <tr>
                        <td colspan="2" style="text-align: center;">Cập nhập sách</td>
                    </tr>
                    <tr>
                        <td>Mã loại sản phẩm</td>
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
                        <td>Mã sản phẩm</td>
                        <td>
                            <input name="ma_sp" type="text" value="<?php echo $ma_sp ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>
                            <input name="tensp" type="text" value="<?php echo $tensp ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                            <?php
                            if (isset($_FILES['hinhanh'])){
                                $file_name=$_FILES['hinhanh']['name'];
                                $file_tmp =$_FILES['hinhanh']['tmp_name'];
                                move_uploaded_file($file_tmp,"images/".$file_name); 
                                }
                            ?>
                        <td><input name="hinhanh" type="file" value="<?php echo $hinhanh ?>"></td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input name="soluong" type="text" value="<?php echo $soluong ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td>
                            <textarea name="mota_sp" cols="40" rows="5" value="<?php echo $mota_sp ?>"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày tạo</td>
                        <td>
                            <input name="create_date" type="date" value="<?php echo $create_date ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input name="btn_save" type="submit" value="Cập nhập">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>
