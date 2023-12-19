<?php
include 'connectionphp.php';
if(isset($_POST['mail'])){
    $mail=$_POST['mail'];
    $pasword=$_POST['pasword'];

    $sql="INSERT INTO admin(email,password) VALUES('$mail','$pasword')";
    echo $sql;
if($con->query($sql)==TRUE){
    header('Location: user.php');
    echo 'inserted';

}
else{
    echo 'not insert';
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
    <style>
        body{background: linear-gradient(to left,skyblue,white, skyblue);}
       .main1{display:flex; flex-direction:column;}
        .main{margin:auto;width:50%;
        display:flex;height:60vh;box-sizing:border-box;border:2px solid #005b96;
        flex-direction:column;justify-content:center;align-items:center;
        }
        .div2{display:flex;align-self:end;margin-bottom:0px;margin-right:30px;}
        .a3{text-decoration: none;padding:8px 7px;border-radius:5px;
        background-color:grey;color:white;}
        .decor{text-decoration: none;padding:8px 30px;border-radius:5px;
        background-color:#005b96;color:white;}
        /* #6c5b7b */
    </style>
</head>
<body>
    
<div class="main1">
<div class="div2"><a class="a3" href="user.php">Back</a></div>
<div class="card main ">
<form action="add.php" method="POST">
        <label for="">Email: </label>
        <input type="text" name="mail"><br><br>
        <label for="">Password: </label>
        <input type="password" name="pasword" id="">
        <br><br>
        <input class="decor" type="submit" name="submit" id="">
    </form>
</div>
</div>
  










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>


