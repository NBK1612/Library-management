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

<h1>Tìm kiếm độc giả</h1>
<br>
<form action="" method="GET">
    <label for="search">Tìm kiếm theo tên hoặc mã:</label>
    <input type="text" id="search" name="keyword">
    <input type="submit" value="Tìm kiếm">
</form>

<?php
require_once "connect.php";

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    $sql = "SELECT * FROM customer WHERE makh LIKE '%$keyword%' OR tenkh LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Kết quả tìm kiếm:</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['tenkh'] . " - Mã: " . $row['makh'] . "</li>";
        ?>
        <?php 
                
                ?>
        <?php

        }
        echo "</ul>";
    } else {
        echo "Không tìm thấy độc giả phù hợp.";
    }
    } else {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
    }
}
?>
        </div>
    </div>
</body>

</html>