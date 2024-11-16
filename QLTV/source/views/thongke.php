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
// Kết nối đến cơ sở dữ liệu
require_once "connect.php";

// Lấy doanh thu theo sản phẩm
$sql = "SELECT ma_sp, tensp, SUM(soluong) AS soluong FROM orderdetail GROUP BY ma_sp";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Hiển thị bảng báo cáo
    echo "<h2>Báo cáo thống kê mượn sách</h2>";
    echo "<table border='1'>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
            </tr>";

    $tongDoanhThu = 0; // Tổng doanh thu của tất cả sản phẩm

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['ma_sp']}</td>
                <td>{$row['tensp']}</td>
                <td>{$row['soluong']}</td>
            </tr>";

        
    }

    echo "</table>";
} else {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
?>
        </div>
    </div>

    </body>

</html>