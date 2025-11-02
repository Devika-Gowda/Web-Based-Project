<?php
$id=$_GET["fid"];
$con=new mysqli("localhost","root","","phpdairy");
if($con->connect_error){
    die("Failed to connect:".$con->connect_error);
}
$sql="SELECT * FROM tblfeed WHERE $id=cf_id ";
$result=$con->query($sql);
if(!$result){
    die("Invalid query:".$con->error);
}
while($row = $result->fetch_assoc()){
    $p_id=$row['p_id'];
}
do{
    $sql="INSERT INTO tblorder(cf_id,p_id) VALUES (,$p_id)";
    $result=$con->query($sql);
    if(!$result){
        die("Invalid query:".$con->error);
    }
    echo "<script>Order Placed!!!</script>";
}while(false);

?>