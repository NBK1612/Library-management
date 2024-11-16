<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <title>Đăng nhập</title>
</head>

<?php
    require_once("connect.php");
    $txt_fullname ="";
    $txt_email ="";
    $txt_password="";
    $mucdotruycap="";
    if (isset($_POST["btn_dangky"])){
        $txt_fullname =$_POST["txt_fullname"];
        $txt_email =$_POST["txt_email"];
        $txt_password=$_POST["txt_password"];
        $mucdotruycap=$_POST["mucdotruycap"];
            $sql="SELECT*FROM dangkythanhvien WHERE email='txt_email' ";
            $rel=mysqli_query($conn,$sql);
            if(mysqli_num_rows($rel)>0){
                echo"Email đã tồn tại";
            }else{
                $sql = "INSERT INTO dangkythanhvien VALUE ('$txt_fullname', '$txt_email', '$txt_password', '$mucdotruycap')";
                $rell=mysqli_query($conn,$sql);
                echo"Đăng ký thành công";
            }
    }

    session_start();
    require_once("connect.php");
    if(isset($_POST["btn_login"])){
        $txt_email = isset($_POST["txt_email"]) ? $_POST["txt_email"] : "";
        $txt_password = isset($_POST["txt_password"]) ? $_POST["txt_password"] : "";
        $mucdotruycap = isset($_POST["mucdotruycap"]) ? $_POST["mucdotruycap"] : "";

        if($mucdotruycap == "quantri"){
            $sql="SELECT * FROM dangkythanhvien WHERE email = '$txt_email' and password = '$txt_password' and level ='$mucdotruycap' ";
            $rel=mysqli_query($conn,$sql);

            if(mysqli_num_rows($rel) > 0){
                echo" Đăng nhập thành công";
                $_SESSION["email"]=$txt_email;
                header("location: quantri.php");
            }else{
                echo "Email hoặc mật khẩu sai";
            }
        }
        if($mucdotruycap == "nguoidung"){
            $sql="SELECT * FROM dangkythanhvien WHERE email = '$txt_email' and password = '$txt_password' and level ='$mucdotruycap' ";
            $rel=mysqli_query($conn,$sql);
            if(mysqli_num_rows($rel) > 0){
                echo" Đăng nhập thành công";
                $_SESSION["email"]=$txt_email;
                header("location: index.php");
            }else{
                echo "Email hoặc mật khẩu sai";
            }
        }
    }
?>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Đăng ký</h1>
                <input name="txt_fullname" type="text" placeholder="Họ và tên" />
                <input name="txt_email" type="text" placeholder="Email">
                <input name="txt_password" type="password" placeholder="Nhập mật khẩu" />
                <select name ="mucdotruycap">
                    <option value ="quantri"> Quản trị</option>
                    <option value ="nguoidung" selected="selected">Người dùng</option>
                </select>
                <input type="submit" name="btn_dangky"  value="Đăng ký" />
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Đăng nhập</h1>
                <input name="txt_email" type="text" placeholder="Email">
                <input name="txt_password" type="password" placeholder="Mật khẩu" />
                <select name ="mucdotruycap">
                    <option value ="quantri"> Quản trị</option>
                    <option value ="nguoidung" selected="selected">Người dùng</option>
                </select>
                <input type="submit" name="btn_login" value="Đăng nhập"> 
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Đăng ký tài khoản để sử dụng thư viện</p>
                    <button class="hidden" id="login">Đăng nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Đăng nhập để sử dụng thư viện</p>
                    <button class="hidden" id="register">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="JS/script.js"></script>
</body>

</html>