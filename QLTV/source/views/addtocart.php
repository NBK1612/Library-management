<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/styleindex.css">
    <title>Thư viện</title>
</head>

<body>
<?php
session_start();
?>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-library'></i>
            <div class="logo-name"><span>THƯ </span>VIỆN</div>
        </a>
        <ul class="side-menu">
            <li><a href="index.php"><i class='bx bx-store-alt'></i>Trang chủ</a></li>
            <li><a href="search_product.php"><i class='bx bx-search'></i>Tìm kiếm</a></li>
            <li><a href="addtocart.php"><i class='bx bx-book-reader'></i>Mượn trả sách</a></li>
            <li><a href="password_update.php"><i class='bx bx-key'></i>Đổi mật khẩu</a></li>
            <li><a href="thongtin_update.php"><i class='bx bx-user-pin'></i>Cập nhật thông tin</a></li>
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
    require_once "connect.php";

         //$id = $_GET["id"];
    //echo $id;
    $id=isset($_GET["id"])?$_GET["id"]:"";
    $sql="SELECT * FROM adproduct WHERE ma_sp='$id'";
    $rel=mysqli_query($conn,$sql);

    if(mysqli_num_rows($rel)>0){
        while ($r=mysqli_fetch_assoc($rel)){
        if (isset($_SESSION['cart'][$id])){
            if(isset($_SESSION['cart'][$id]['qty'])){
                $_SESSION['cart'][$id]['qty'] +=1;
            }
            else{ $_SESSION['cart'][$id]['qty'] =1;
            };

            $_SESSION['cart'][$id]['ma_sp']=$r['ma_sp'];
            $_SESSION['cart'][$id]['tensp']=$r['tensp'];
            $_SESSION['cart'][$id]['hinhanh']=$r['hinhanh'];
        }
        else {
            $_SESSION['cart'][$id]['qty'] =1;
            $_SESSION['cart'][$id]['ma_sp']=$r['ma_sp'];
            $_SESSION['cart'][$id]['tensp']=$r['tensp'];
            $_SESSION['cart'][$id]['hinhanh']=$r['hinhanh'];
            
            }
        }
    }

    ?>

<?php
    if(isset($_SESSION['cart'])) {
        ?>

    <form action="" method="post">
        <table width="1000" border="1">
        <tr>
            <th width="50" height="57">STT</th>
            <th width="100">Mã sách</th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Chức năng</th>
        </tr>

        <?php
        $i = 0;
            foreach ($_SESSION['cart'] as $k => $v){
                $i++;
            ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $v['ma_sp'];?></td>
            <td><?php echo $v['tensp'];?></td>
            <td>
                <img src="./images/<?php echo $v["hinhanh"];?>" width="80" />
            </td>
            <td>
            <input type="text" value="<?php echo $v['qty']; ?>" name="qty[<?php echo $k; ?>]" />
            </td>
            <td><a href="delete_addtocart.php?key=<?php echo $k; ?>" style="color:blue">Xóa</a></td>
        </tr>
        <?php } ?>

        <tr>
            <td height="30" colspan="10">
                <input name="btn_update" type="submit" value="Cập nhật">
                <input name="btn_submit" type="submit" value="Đăng ký">
            </td>
        </tr>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["btn_update"])) {
                // Cập nhật số lượng trong giỏ hàng
                foreach ($_POST['qty'] as $key => $val) {
                    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                    if (isset($_SESSION['cart'][$key])) {
                        // Đảm bảo số lượng là một số nguyên không âm
                        $newQty = max(0, intval($val));
                        
                        // Cập nhật số lượng trong giỏ hàng thành giá trị mới nhập từ bàn phím
                        $_SESSION['cart'][$key]['qty'] = $newQty;
                    }
                }
                header('Location: addtocart.php');
                exit(); // Đảm bảo kết thúc sau khi chuyển hướng
            }
        }
        ?>
        </table>
        <br>
        <?php
        $mahd="MT".mt_rand(0,1000000);
        $makh="DG".mt_rand(0,1000000);
        if (isset($_POST["btn_submit"])){
            if ($_POST["btn_submit"]=="Mượn sách"){
                $tenkh=isset($_POST["tenkh"])?$_POST["tenkh"]:"";
                $email=isset($_POST["email"])?$_POST["email"]:"";
                $phone=isset($_POST["phone"])?$_POST["phone"]:"";
                $diachi_lh=isset($_POST["diachi_lh"])?$_POST["diachi_lh"]:"";
            $create_date=isset($_POST["create_date"])?$_POST["create_date"]:"";
        //thông tin lưu vào trang khách hàng	
            $sql4="INSERT INTO customer VALUES ('$makh','$tenkh',";
            $sql4.="'$phone','$email','$diachi_lh')";
            $rel4=mysqli_query($conn,$sql4);
            //lưu thông tin bảng hóa đơn
            $sql5="INSERT INTO `order`(`mahd`, `makh`, `tenkh`,`create_date`) VALUES ('$mahd','$makh','$tenkh','$create_date')";
            $rel5=mysqli_query($conn,$sql5);
        // lưu thông tin bảng chi tiết hóa đơn
        foreach ($_SESSION['cart'] as $k6=>$v6){
            $ma_sp=$v6['ma_sp'];
            $tensp=$v6['tensp'];
            $hinhanh=$v6['hinhanh'];
            $soluong=$v6['qty'];
        $sql6="INSERT INTO `orderdetail`(`mahd`, `ma_sp`, `tensp`, `soluong`,`hinhanh` ) VALUES ('$mahd','$ma_sp','$tensp','$soluong','$hinhanh')";
        $rel6=mysqli_query($conn,$sql6);
            }
            echo "Bạn đã đăng ký mượn thành công";
            }
        }
            ?>
        <?php if(isset($_POST["btn_submit"])){
            if ($_POST["btn_submit"]=="Đăng ký"){
            ?>

    <table width="441" border="1">
        <tr>
            <td height="40" width="215">Mã độc giả</td>
            <td width="160">
            <input name="makh" type="text"
                value="<?php echo $makh;?>" readonly>
            </td>
        </tr>
        <tr>
            <td height="40">Tên độc giả</td>
            <td><input name="tenkh" type="text"></td>
        </tr>
        <tr>
            <td height="40">Email</td>
            <td><input name="email" type="text"></td>
        </tr>
        <tr>
            <td height="40">Phone</td>
            <td><input name="phone" type="text"></td>
        </tr>
        <tr>
            <td height="40">Địa chỉ liên hệ</td>
            <td><input name="diachi_lh" type="text"></td>
        </tr>
        <tr>
            <td height="40">Ngày mượn</td>
            <td><input name="create_date" type="date"></td>
        </tr>
        <tr>
        <td height="40" colspan="2">
        <input name="btn_submit" type="submit" value="Mượn sách">
        </td>
        </tr>
        </table>
    <?php
            }
            }
        ?>
    </form>
    <?php 
    }
    ?>
    </div>
        </div>
    </div>

</body>

</html>