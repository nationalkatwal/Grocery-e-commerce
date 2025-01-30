<html>
    <head></head>
    <body>
<?php
if(!isset($_SESSION['adminid']))
{
    header("location:login.php");
}
$conn = mysqli_connect("localhost", "root", "root", "online_grocery") or die("connection error");
if(isset($_REQUEST['id']))
{
    $sql = "DELETE FROM `orders` WHERE `orderid`=".$_REQUEST['id'];
    $result = mysqli_query($conn, $sql);
    $affected_row = mysqli_affected_rows($conn);
    if($affected_row > 0)
    {
        header("location:view_order_list.php");
    }
}
mysqli_close($conn);
?>
    </body>
</html>