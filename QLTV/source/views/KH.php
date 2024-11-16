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
          <h3>Thay đổi thông tin độc giả</h3>
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
            
            header('location: KH.php');
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
        <tr>
          <th height="30" colspan="6" style="text-align: center;">DANH SÁCH ĐỘC GIẢ</th>
        </tr>
        <tr>
          <th width="200" height="30">Mã độc giả</th>
          <th width="200">Tên</th>
          <th width="200">Số điện thoại</th>
          <th width="200">Email</th>
          <th width="200">Địa chỉ liên hệ</th>
          <th width="200">Hành động</th>
        </tr>
      </thead>
        <?php
        for( $i = 0; $i < count($res); $i++ ) {
            ?>
      <tr>
        <td height="30"><?php echo $res[$i]["makh"]?></td>
        <td><?php echo $res[$i]["tenkh"]?></td>
        <td><?php echo $res[$i]["phone"]?></td>
        <td><?php echo $res[$i]["email"]?></td>
        <td><?php echo $res[$i]["diachi_lienhe"]?></td>
        <td><button><a href="?id=<?php echo $res[$i]['makh']?>">Sửa</a></button>
            <button><a href="KH_delete.php?id=<?php echo $res[$i]["makh"]; ?>">Xóa</a></button>
        </td>
        </tr>
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