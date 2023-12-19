<?php

echo 'delete';

?>
<?php
include 'connectionphp.php';
$id=$_GET['id'];
$sql="DELETE FROM product WHERE id='$id';";
if($con->query($sql)==TRUE){
    header('Location: index.php');
    echo 'delete';
}
else {
    echo 'not delete';
    echo $sql;
}


?>
