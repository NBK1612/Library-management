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
        <div class="main">
        <form action="" method="post">
    <table width="341" border="1" align="center">
        <tr>
            <td height="40" colspan="2" style="text-align:center">
                <h3>Đổi Mật Khẩu</h3>
            </td>
        </tr>
        <tr>
            <td width="155" height="40">Mật khẩu hiện tại</td>
          <td width="170"><input type="password" name="current_password" placeholder="Mật khẩu hiện tại" /></td>
        </tr>
        <tr>
            <td height="40">Mật khẩu mới</td>
          <td><input type="password" name="new_password" placeholder="Mật khẩu mới" /></td>
        </tr>
        <tr>
            <td height="40" colspan="2" align="center">
                <input name="ChangePassword" type="submit" value="Đổi mật khẩu" />
            </td>
        </tr>
    </table>
</form>
<?php
    require_once("connect.php");
    session_start();
    function getUserDetails($email, $conn) {
        $sql = "SELECT * FROM dangkythanhvien WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    function updatePassword($email, $newEmail, $conn) {
        $sql = "UPDATE dangkythanhvien SET Password = '$newEmail' WHERE email = '$email'";
        return mysqli_query($conn, $sql);
    }
    if (isset($_POST["ChangePassword"])) {
        $email = $_SESSION['email'];
        $currentPassword = $_POST["current_password"];
        $newPassword = $_POST["new_password"];
    
        // Get user details
        $userDetails = getUserDetails($email, $conn);
    
        // Verify current password
        if ($currentPassword == $userDetails['password']) {
            // Update the password
            if (updatePassword($email, $newPassword, $conn)) {
                echo "Đổi mật khẩu thành công";
            } else {
                echo "Đổi mật khẩu không thành công";
            }
        } else {
            echo "Mật khẩu hiện tại không đúng";
        }
    }
?>
        </div>
    </div>
</body>

</html>
