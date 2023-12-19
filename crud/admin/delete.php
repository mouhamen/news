<?php
include 'connectionphp.php';
$id=$_GET['id'];
$sql="DELETE FROM admin WHERE id='$id';";
if($con->query($sql)==TRUE){
    header('Location: user.php');
    echo 'delete';
}
else {
    echo 'not delete';
    echo $sql;
}


?>