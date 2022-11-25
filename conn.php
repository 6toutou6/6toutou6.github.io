<?php 
$hostname = "localhost"; //主机名,可以用IP代替
$database = "bas2018304055"; //数据库名
$username = "root"; //数据库用户名
$password = "123456"; //数据库密码
$conn = mysqli_connect($hostname, $username, $password) 
or trigger_error(mysqli_error( $conn) , E_USER_ERROR); 
mysqli_set_charset($conn,'utf8');
mysqli_select_db( $conn,$database); 
$db = @mysqli_select_db($conn, $database) or die(mysqli_error($conn));
?>