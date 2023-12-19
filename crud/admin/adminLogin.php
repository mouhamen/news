<?php
session_start();
include 'connectionphp.php';
if(isset($_POST['emaill'])){
$emaill=$_POST['emaill'];
$passwordd=$_POST['passwordd'];

$sql="SELECT * FROM main_admin WHERE email='$emaill' AND password='$passwordd';";
$result=$con->query($sql);
if($result->num_rows>0){
echo 'Successfully Login';
$_SESSION['log']= true;
header('Location: index.php');

}
else{
    echo 'Invalid Email and Password';
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a1{width:100%;height:96vh;background-image:url('pink3.jpg');
            background-repeat:no-repeat;background-size:100%;}
        .a2{box-sizing:border-box;width:50%; height:60vh;margin:auto;padding-top:120px;padding-left:100px;}
    </style>
</head>
<body>
    <div class="a1">
<div class="a2">
    
<form action="#" method="POST">
        <label for="">Email</label>
        <input type="text" name="emaill" id=""><br><br>
        <label for="">Password</label>
        <input type="password" name="passwordd" id=""><br><br>
        <input type="submit" name="submit" id="">
    </form>

</div>

</div>
</body>
</html>