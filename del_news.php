<?php 
include ("conn.php");
mysqli_query($conn,"set names gb2312");
$name=$_GET['table'];
$query="SHOW FULL COLUMNS FROM $name";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
while($row_=mysqli_fetch_assoc($result)){
    $rows_[]=$row_['Field'];
}
$length_=count($rows_);
$id=$_GET['id'];
$name=$_GET['table'];
$sql = "DELETE FROM $name WHERE $rows_[0]='$id'";
$res=null;
try{
    $result1 = @mysqli_query($conn,$sql);
    $res=mysqli_errno($conn);   
    if($result1)
    {
        ?>
            echo "<script language=javascript>window.alert('成功删除,请返回');history.back(1);</script>";
        <?php
    } //result1==true
    else{
        throw new Exception("query failed");
    }
}
catch (Exception $e){
    echo"$res";
    echo"$e";
    if($res=="1451"){
        if($name=="customers" or $name=="employees" or $name=="products"){
            echo "<script language=javascript>window.alert('删除失败,请在purchase表中先删除相应数据,才能在此做删除');history.back(1);</script>";
        }
        if($name=="suppliers"){
            echo "<script language=javascript>window.alert('删除失败,请在products表中先删除相应数据,才能在此做删除');history.back(1);</script>";
        }
        
    }

}
?>