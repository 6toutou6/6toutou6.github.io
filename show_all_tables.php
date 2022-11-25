<!doctype html>
<html>
<style>
    body{
        background-image:url(粉色.jpg);
        background-size: 100% ,100%;
        width: 100%;
        height: 100%;
    }
</style>
</html>
<?php
include("conn.php");
header("Content-type:text/html;charset=utf-8");
mysqli_select_db($conn, 'bas2018304055');
$query = "show tables from bas2018304055";//展示表格
//将表明和表的列名拿出来
$result = mysqli_query($conn, "SELECT TABLE_NAME,TABLE_ROWS
FROM information_schema.tables
WHERE TABLE_SCHEMA = 'bas2018304055' 
ORDER BY TABLE_NAME");//将表格名字和列数量挑选出来
$tables = array();
echo "<table align='center'>";
echo "<tr><th>Tables</th><th>Nums</th><th>Oper</th></tr>";
echo '<link rel="stylesheet" type="text/css" href="fragment11.css">';
while ($myrow = mysqli_fetch_array($result)) 
{
echo "<tr>";
//表格名字
echo "<td onclick=location.href='show_details.php?m=$myrow[0]'>" . $myrow[0] . "</td>"; 
/*echo "<td>$myrow[1]</td>";*/
//表格里的数据数量
echo "<td>$myrow[1] </td>";
//插入数据的跳转
echo "<td onclick=location.href='insert.php?m=$myrow[0]'><font color = 'white'>插入</font>";
echo "</tr>";
}
echo"</table>"
?>