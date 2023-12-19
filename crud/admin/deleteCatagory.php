
<?php
include 'connectionphp.php';
$catid=$_GET['cid'];
$sql="DELETE  FROM catagory WHERE catagory_id='$catid'";
if($con->query($sql)==TRUE){
    header('Location: catagory.php');
    echo 'delete';
}
else {
    echo 'not delete';
    echo $sql;
}


?>