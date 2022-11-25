<?php
$table = $_GET['m'];
echo "<table align='center'>";
echo "<th>$table</th></table>";
echo '<link rel="stylesheet" type="text/css" href="fragment01.css" charset="utf-8">';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<style>
    body{
        background-image:url(e.jpg);
        background-size: 100% ,100%;
        width: 100%;
        height: 100%;
    }
</style>
<body>
<th width=300px>
    <form action="" method="post" name ="indexf">
        <p align="center"><input type="text" name ="sel" style="line-height:50px ;width:200px"/>
        <input type = "submit" value="搜索" name="selsub" style="height:60px ;width:100px"/></p>
    <table>
</th>
<?php
include("conn.php");
$table = $_GET['m'];                        //表格名字
$query = "SHOW FULL COLUMNS FROM $table";   //获取列
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row['Field'];                //得到列，名字数组
}
echo "<table align='center'><tr><tr>";
echo"<td><a href ='show_all_tables.php?><font color='red'>返回</font></td>";
echo"</tr>";
$length = count($rows);                     //列的数量
echo '<link rel="stylesheet" type="text/css" href="fragment01.css" charset="utf-8">';
echo "<table align='center'><tr><tr>";
for ($i = 0; $i < $length; $i++) {
    echo "<th>" . $rows[$i] . "</th>";      //输出列名
}
echo "<th>oper</th>";
echo "</tr>";
$result1 = mysqli_query($conn, "SELECT *from $table");  //将表内数据全部选出
$k = 0;
$return=$_SERVER['REQUEST_URI'];

while ($row = mysqli_fetch_array($result1)) {           //
    $select_id = $rows['0'];
    //echo"$select_id";
    $id = $row[$rows['0']];
    //echo"$id";
}


if(!empty($_POST["selsub"]))//如果点击查询了，输出相关内容
{   
    $table = $_GET['m'];
    $sel=$_POST["sel"];//得到查询的内容
    //开始拼接sql语句
    $string .="'";
    $string .="%$sel%'";
    for($i = 0 ; $i < $length ; $i ++)
    {
        $nn .= $rows[$i]; 
        $nn .= " like "; 
        $nn .= " $string "; 
        if($i != $length- 1 )
        {
            $nn .= " or "; 
        }
    }
    $nn .= ";";
    $sql="select * from $table where ";
    $sql .= $nn ;
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}
else{//没点查询则输出所有内容
    $res=mysqli_query($conn,"select * from $table") or die(mysqli_error($conn));
}

while($rrow= mysqli_fetch_array($res) or die(mysqli_error($conn)))
{
    echo"<tr>";
    for ($i = 0; $i < $length; $i++){
        echo"<th>$rrow[$i]</td>";//数据
        //echo"$rrow[$i]";
        $in[$i]=$rrow[$i];
        
    }
    echo"<td>
    <a href='del_news.php?id=$rrow[0]&table=$table'><font color='red'>删除</font>
    <a href ='edit.php?return=$return&table=$table&select_id=$select_id&id=$rrow[0]&length=$length'>
    <font color='white'>修改</font>
    </td>";
    echo"</tr>";
}
//echo ("<script>setTimeout('window.location.reload()',2000);</script>");
?>
</table>
</form>
</body>
</html>