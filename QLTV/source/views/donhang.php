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
            if(!isset($_GET["mod"])) {
                $sql = "SELECT * FROM `order`";
                $rel = mysqli_query($conn, $sql);
                $res = getRes($rel);
                ?>
        <div class="container">
            <table width="770" border="1" class="table">
            <thead>
                <tr>
                    <th height="30" colspan="5" style="text-align: center;">DANH SÁCH MƯỢN TRẢ</th>
                </tr>
                <tr>
                <th width="90" height="40">Mã</th>
                <th width="200">Trạng thái</th>
                <th width="150">Xem</th>
                <th width="190">Hành động</th>
                </tr>
            </thead>
                <?php
                for( $i = 0; $i < count($res); $i++ ) {
                    ?>
            <tr>
                <td height="70"><?php echo $res[$i]["mahd"]?></td>
                <td><?php
                if($res[$i]["trangthai"] == '0') { ?>
                Chưa Hoàn Thành
                <?php } else if($res[$i]['trangthai'] == '1') {?>
                Đang mượn
                    <?php
                }else{
                    ?>
                Đã trả sách
                    <?php
                }?>
                </td>
            <td><button><a href="./viewDonhang.php?id=<?php echo $res[$i]['mahd']?>&mod=view">Xem</a></button></td>

            <td>
                <form action="" method="get">
                    <input type="hidden" name="id" value="<?php echo $res[$i]['mahd']?>">
                    <input type="hidden" name="mod" value="update">
                    <input type="radio" name="status" id="tets1" value="1" <?php  
                    if(!($res[$i]["trangthai"] == '0')) { ?> disabled <?php 
                    }?>><label for="tets1">Đang mượn</label>
                    <input type="radio" name="status" id="tets2" value="2" <?php
                    if(!($res[$i]["trangthai"] == '1')) {?>disabled<?php 
                    }?>><label for="tets2">Đã trả sách</label>
                    <button type="submit">Xác Nhận</button>
                    <button><a href="?id=<?php echo $res[$i]['mahd']?>&mod=delete">Xoá</a></button>
                </form>
                </td>

            </tr>
                    <?php   
                }
            }else{
                switch($_GET["mod"]) {
                case "update": {
                    $status = $_GET['status'];
                    $id = $_GET["id"];
                    //if($status != "1" || $status != "2") {
                    //  echo "unknown status";
                // }else{
                        $sql = "UPDATE `order` SET `trangthai`='$status' WHERE mahd = '$id'";
                        $result = mysqli_query($conn, $sql);
                        echo "Cập nhật thành công";
                // }
                }
                break;
                
                break;
                case "delete": {
                    $id = $_GET["id"];
                    $idkh = mysqli_query($conn, "SELECT `makh` FROM `order` WHERE `mahd` = '$id'")->fetch_array()["makh"];
                    // var_dump($idkh);
                    // xoa hoa don
                    $sql = "DELETE FROM `order` WHERE `mahd` = '$id'";
                    $result = mysqli_query($conn, $sql);
                    // xoa hoa don detail
                    $sql = "DELETE FROM `orderdetail` WHERE `mahd` = '$id'";
                    $result = mysqli_query($conn, $sql);
                    // xoa customer
                    $sql = "DELETE FROM `customer` WHERE `makh` = '$idkh'";
                    $result = mysqli_query($conn, $sql);
                    
                    echo "Xóa thành công";
                }
                break;
                case "view": {
                    header("location: veiwDonhang.php");
                    exit();
                }
                }
                header('location: donhang.php');
                exit();
            }
            ?>
            </table>
        </div>
        </div>
    </div>
</body>

</html>