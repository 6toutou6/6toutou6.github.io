<?php
include ("conn.php");
if (!empty($_POST['insert_ok']))
{ 
    $name = $_POST['tabl'] ;
    $length = $_POST['insert_length'] ;
    $string="" ;//添加的value
    $string_rows="";//每一列的名字 
    mysqli_connect("localhost","root","123456","bas2018304055");
    mysqli_select_db($conn,"bas");
    $query = "SHOW FULL COLUMNS FROM $name";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    while($row= mysqli_fetch_assoc($result))
    {//这里获取到了列的名称，并且已经放入了rows数组
        $rows[]=$row['Field'];
    }
    for($i = 0 ; $i < $length ; $i ++)
    {
        //拼接mysql语句
        $string .="'";
        $string .=$_POST[$i];
        $string_rows .= $rows[$i]; 
        $string .="'";
        if($i != $length- 1 )
        {
            $string .=",";
            $string_rows .=",";
        }
    }
    $sql ="INSERT INTO $name ($string_rows) VALUES ($string)";
    //echo"<td>$string</td>";
    //echo"<td>$name</td>";
    //echo"<td>$string_rows</td>";
    //echo "<th>$sql<th>";
    $result = @mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result)
    {
    echo "<script language=javascript>window.alert('成功插入,请返回');history.back(1);</script>";
    } //result1==true
    else{
        echo "<script language=javascript>window.alert('成功aaaaa,请返回');history.back(1);</script>";
    }
}
?>