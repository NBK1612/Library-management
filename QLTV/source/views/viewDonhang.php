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
session_start();
require_once "connect.php";

  $id = $_GET['id'];
  $sql = "SELECT * FROM `order` WHERE `mahd`='$id'";
  $result = mysqli_query($conn, $sql);
  $res = getRes($result)[0];
  $idKh = $res["makh"];

  $sql2 = "SELECT * FROM `customer` where `makh`='$idKh'";
  $result2 = mysqli_query($conn, $sql2);
  $res2 = getRes($result2)[0];

  $sql3 = "SELECT * FROM `orderdetail` WHERE `mahd`='$id'";
  $result3 = mysqli_query($conn, $sql3);
  $res3 = getRes($result3);
  
  $stt = 1;
  $tt = 0;
?>
<div>
  <div>
    <table width="300" height="72" border="1" class="table">
      <thead>
        <th width="100">STT</th>
        <th width="100">Tên</th>
        <th width="100">Hình ảnh</th>
        <th width="100">Số lượng</th>
      </thead>
      <tbody>
        <?php
        for($i = 0;$i<count($res3);$i++) {
            ?>
        <tr>
          <td><?php echo $stt;$stt++;?></td>
          <td><?php echo $res3[$i]["tensp"]?></td>
          <td><img src="images/<?php echo $res3[$i]["hinhanh"]; ?>" width="120"></td>
          <td><?php echo $res3[$i]["soluong"]?></td>
        </tr>

        <?php }?>
      </tbody>
    </table>
  </div>
  <br>
  <br>

  <div>
<table width="350" height="350" border="1" class="table">
      <tr>
        <td width="150">Tên khách hàng</td>
        <td width="150"><?php echo $res2["tenkh"]?></td>
      </tr>


      <tr>
        <td>SĐT</td>
        <td><?php echo $res2["phone"]?></td>
      </tr>

      <tr>
        <td>Email</td>
        <td><?php echo $res2["email"]?></td>
      </tr>

      <tr>
        <td>Địa chỉ liên hệ</td>
        <td><?php echo $res2["diachi_lienhe"]?></td>
      </tr>
      <tr>
        <td>Trạng thái</td>
        <td>
          <?php if($res["trangthai"]==0) {  echo "Chưa hoàn thành";
          } else if($res["trangthai"]== 1) { echo "Đang Mượn";
          } else { echo "Đã trả sách";
          }
            // ? "chưa hoàn thành": $res["trangthai"] == 1 ? "": "Đang giao hàng" ?>
        </td>
      </tr>
    </table>
  </div>
</div>
</div>
    </div>
</body>

</html>