<?php
//kết nối cơ sở dữ liệu
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname='qltv';
$conn =mysqli_connect($hostname,$username,$password,$dbname);
mysqli_set_charset($conn, "utf8");
if(!$conn){
    die("không thể kết nối".mysqli_error($conn));
    exit();
}

function getRes($result)
{
    $res = array();
    foreach($result as $key => $value){
        $res[$key] = $value;
    }
    return $res;
}
?>