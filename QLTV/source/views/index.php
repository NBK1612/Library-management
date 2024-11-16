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
        <h1>Danh sách</h1>
        <div class="insights">
            <?php 
                require_once "connect.php";
                $sql = "SELECT * FROM adproduct";
                $rel = mysqli_query($conn, $sql);
                if(mysqli_num_rows($rel) > 0) {
                    while ($r = mysqli_fetch_assoc($rel)) {
                        //var_dump($r);
                        $hinhanh = $r['hinhanh'];
                        $masp = $r['ma_sp'];
                        $tensp = $r['tensp'];
                        $soluong = $r['soluong']
                        ?>           
            <div class="card">
                <img src="./images/<?php echo $hinhanh;?> " width="220px" height="150px" />
                <div class="card_container">
                <h3><?php echo $tensp?></h3>
                <h3>Số lượng: <?php echo $soluong?></h3>
                <h4><a href="addtocart.php?id=<?php echo $masp; ?>" style=" color:black">Mượn</a></h4>
                </div>
            </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        </div>
    </div>

</body>

</html>