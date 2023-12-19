<?php
include 'connectionphp.php';
$id=$_GET['id'];
$sql="SELECT * FROM admin WHERE id='$id';";
$result=$con->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
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
        body{background: linear-gradient(to right,skyblue ,white, skyblue);}
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
<div class="card main">
<form action="edit.php" method="POST">
    <input type="hidden" name="pid" value="<?php echo $id; ?>">
        <label for="">Email: </label>
        <input type="text" name="mail" value="<?php echo $row['email']; ?>"><br><br>
        <label for="">Password: </label>
        <input type="password" name="pasword" value="<?php echo $row['email']; ?>">
        <br><br>
        <input type="submit" class="decor" name="submit" id="">
    </form>
</div>
</div>
<?php
    }
}
    ?><br>
 <?php
 if(isset($_POST['mail'])){
    $pid=$_POST['pid'];
    $mail=$_POST['mail'];
    $pasword=$_POST['pasword'];

    $sql2="UPDATE admin SET email='$mail',password='$pasword' WHERE id='$pid'";
    echo $sql2;
if($con->query($sql2)==TRUE){
    header('Location: user.php');
    echo 'updated';
}
else {
    echo 'not update';
}
}
 ?>   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>






  