<?php
include("conn.php");
$initial=$_GET['col_id'];
$edit_s=$_GET['row'];
$table=$_GET['table_name'];
$query="SHOW FULL COLUMNS FROM $table";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
while($row_=mysqli_fetch_assoc($result)){
    $rows_[]=$row_['Field'];
    //echo"$rows_[1]";
}
if(!empty($_GET['edit_ok'])){
    $length=$_GET['insert_length'];
    //拼接MySQL语句
    $string="update $table set ";
    for($i=0;$i<$length;$i++){
        $string .= $rows_[$i];
        $string .="='";
        $string .="$_GET[$i]'";
        if($i != $length-1){
            $string .= ",";
        }
    }
    $string .=" where $rows_[0]='$initial'";
    //echo "<th>$string</th>";
    $res = mysqli_query($conn, $string) or die(mysqli_error($conn));
    if($res)
    {
        echo "<script language=javascript>window.alert('修改成功,请返回');
        history.back(1);</script>";
    }
    else{
        echo"aaaaaaaaaaaa";
    }
}
?>