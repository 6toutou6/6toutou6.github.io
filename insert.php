<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<style>
    body{
        background-image:url(粉色.jpg);
        background-size: 100% ,100%;
        width: 100%;
        height: 100%;
    }
</style>
<form action="get_insert.php" method="post">
    <table align ='center' class='message_tab'>
        <?php
        include("conn.php");
        $tabl = $_GET['m'];
        $query = "SHOW FULL COLUMNS FROM $tabl";
        $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $rows[] = $row['Field'];
        }
        $length = count($rows);
        //echo "<table align='center'>";
        echo "<table align='center'><th>$tabl</th>";
        echo"<th><input width='100px' type='submit' style='width: 120px;height: 30px;'
        value='插入' name='insert_ok'></th>";
        echo '<link rel="stylesheet" type="text/css" href="fragment11.css">';
        echo "<tr>";
        if($length != 0)
        {
        {
        for($i = 0 ;$i< $length; $i++)
        {
            echo"<tr><td width='200px'>".$rows[$i]."</td>
            <td><input type='text' style='width: 150px;height: 30px;'name=$i  ></td></tr>";//输入的内容
        }
        }
        echo "<input type='hidden' value=$tabl name='tabl'>" ;//将表明和列数量传过去
        echo "<input type='hidden' value=$length name='insert_length'>" ;
        }
        echo"</table>";
    ?>
    </table>
</form>



