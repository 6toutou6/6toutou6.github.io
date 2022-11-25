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
$table=$_GET['table'];
$select_id=$_GET['select_id'];
$id=$_GET['id'];
$length=$_GET['length'];
$sql="select * from $table where $select_id='$id'";
$result1=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$query="SHOW FULL COLUMNS FROM $table";
$result=mysqli_query($conn,$query);
while($row_=mysqli_fetch_assoc($result)){
    $rows_[]=$row_['Field'];
}
$length_=count($rows_);
echo '<link rel="stylesheet" type="text/css" href="fragment11.css">';
echo"<form action ='save_edit.php'mtehod='post'>";

echo"<table align = center>";
//echo"<thead>输入修改后的信之后，点击修改按钮</thead>";
echo"<tr>";
for ($i=0;$i<$length;$i++){
    echo"<th>".$rows_[$i]."</th>";//输出每列的列名
    //echo"<td><input type='hidden' value=$rows_[$i] name=$key_id></td>";
}
echo"<th>操作</th>";
echo"</tr>";
while($row=mysqli_fetch_array($result1)){
    $rows[]=$row;
}
echo"<tr>";
for ($i=0;$i<$length;$i++){
    $in[$i]=$rows[0][$i];//存放修改后的数据
        echo"<td width:100px><input type='text' value=$in[$i] style='width: 150px;height: 30px;' name=$i></td>";
}
echo"<input type='hidden' value=$length name='insert_length'>";
echo"<input type='hidden' value=$table name='table_name'>";
echo"<input type='hidden' value=$id name='col_id'>";
//echo"<input type='hidden' value=$in name='row'>'";
echo"<td><input type='submit' value='修改' style='width: 150px;height: 30px;' name ='edit_ok'></td>";
?>