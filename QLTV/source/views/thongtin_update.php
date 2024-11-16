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

    // lấy dl
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM customer WHERE makh = '$id';";
        $rel = mysqli_query($conn, $sql);
        $res = getRes($rel);
        // $res = $res;
        // $tenkh = $res[0]["tenkh"];
        // var_dump($res);
    ?>

  <form action="" method="post" enctype="multipart/form-data">
    <table width="454" height="374" align="center" class="dkitv" border="1">
      <tr>
        <td colspan="2" style="text-align:center; font-size: 20px">
          <h3>Cập nhật thông tin</h3>
        </td>

      </tr>
      <tr>
        <td height="30">Fullname</td>
        <td><input type="text" name="txt_fullname" placeholder="Nhập đầy đủ họ tên"
            value="<?php echo $res[0]["tenkh"]?>" />
        </td>
      </tr>

      <tr>
        <td height="30">SDT</td>
        <td><input type="text" name="txt_password" placeholder="So dien thoai" value="<?php echo $res[0]["phone"]?>" />
        </td>
      </tr>

      <tr>
        <td height="30">Email</td>
        <td><input type="text" name="txt_email" value="<?php echo $res[0]["email"]?>" /></td>
      </tr>

      <tr>
        <td>Địa chỉ liên hệ</td>
        <td>
          <textarea name="txt_address" rows="8" cols="18"
            placeholder="Nhập địa chỉ"><?php echo $res[0]["diachi_lienhe"]?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="Login" type="submit" value="Cập nhât" />
          <input name="Reset" type="reset" value="Reset" />
        </td>
      </tr>

    </table>

  </form>

        <?php
        $txt_fullname = "";
        $txt_email = "";
        $txt_address = "";
        $txt_address_gh = "";
        if(isset($_POST["Login"])) {
            $txt_fullname = $_POST["txt_fullname"];
            $txt_email = $_POST["txt_email"];
            $txt_password = $_POST['txt_password'];
            $txt_address=$_POST["txt_address"];
            $txt_address_lh=$_POST["txt_address_lienhe"];

            $sql = "UPDATE `customer` SET `tenkh`='$txt_fullname',
        `phone`='$txt_password',`Email`='$txt_email',
        `diachi_lienhe`='$txt_address' WHERE makh = '$id'";
            $rel = mysqli_query($conn, $sql);
            echo "Đã thay đổi thành công thông tin độc giả ";
            
            header('location: thongtin_update.php');
            exit();
        }
    }
    else {
        $sql = "SELECT * FROM customer;";
        $rel = mysqli_query($conn, $sql);
        $res = getRes($rel);
        ?>
        
  <div class="container">
    <table class="table" border="1">
      <thead>
      <?php
        for( $i = 0; $i < count($res); $i++ ) {
            ?>
        <tr>
          <th height="30" colspan="6" style="text-align: center;">Thông tin độc giả</th>
        </tr>
        <tr>
          <td width="200" height="30">Mã độc giả</td>
          <td height="30"><?php echo $res[$i]["makh"]?></td>
        </tr>
        <tr>
            <td width="200">Tên</td>
            <td><?php echo $res[$i]["tenkh"]?></td>
        </tr>
        <tr>
            <td width="200">Số điện thoại</td>
            <td><?php echo $res[$i]["phone"]?></td>
        </tr>
        <tr>
            <td width="200">Email</td>
            <td><?php echo $res[$i]["email"]?></td>
        </tr>
        <tr>
            <td th width="200">Địa chỉ liên hệ</td>
            <td><?php echo $res[$i]["diachi_lienhe"]?></td>
        </tr>
        <th height="40" colspan="2" align="center"><button><a href="?id=<?php echo $res[$i]['makh']?>">Cập nhật</a></button></th>
      </thead>
       
            <?php   
        }
    }
    ?>
    </table>
  </div>
  </div>
    </div>
</body>

</html>