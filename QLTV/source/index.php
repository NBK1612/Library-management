<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleindex.css">
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
            <li>
                <a href="./views/login.php" class="logout">
                    <i class='bx bx-log-in-circle'></i>
                    Đăng ký/Đăng nhập
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->
    <div class="content">
        <h1>Trang chủ</h1>
        <div class="insights">
            <?php 
                require_once "./views/connect.php";
                $sql = "SELECT * FROM adproduct";
                $rel = mysqli_query($conn, $sql);
                if(mysqli_num_rows($rel) > 0) {
                    while ($r = mysqli_fetch_assoc($rel)) {
                        //var_dump($r);
                        $hinhanh = $r['hinhanh'];
                        $masp = $r['ma_sp'];
                        $tensp = $r['tensp'];
                        ?>
            <div class="card">
                <img src="./views/images/<?php echo $hinhanh;?> " width="220px" height="150px" />
                <div class="card_container">
                <h4><?php echo $tensp?></h4>
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