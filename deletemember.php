<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $con=new mysqli("localhost","root","","phpdairy");
    $sql="DELETE FROM tblproducer WHERE p_id=$id";
    $con->query($sql);
}
header("location:/phpdairy/membership.php");
exit;
?>